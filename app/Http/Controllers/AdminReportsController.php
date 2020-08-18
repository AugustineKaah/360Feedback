<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedback_requests;
use App\feedback_result;
use App\user;
use App\departments;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class AdminReportsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = user::all();
        $departments = departments::all();
        
        //$feedbacks = feedback_requests::all();
        $feedbacks = feedback_requests
        ::leftJoin('users', 'feedback_requests.user_id', '=', 'users.id')
        ->select('users.id', 'users.department_id', 'feedback_requests.status')
        ->getQuery()
        ->get();
       
        $completed =  $feedbacks->filter(function ($results) {
            return $results->status == 'Completed';
        });
        $pending =  $feedbacks->filter(function ($results) {
            return $results->status == 'Pending';
        });
        $all_results = feedback_result
        ::leftJoin('competencies', 'feedback_results.competency', '=', 'competencies.competency')
        ->select('competencies.core_value_id', 'feedback_results.rating')
        ->getQuery()
        ->get();
        $user_count = count($users);
        $feedback_count = count($feedbacks);
        $completed_count = count($completed);
        $pending_count = count($pending);
        //loop through results, add them up and find average

        $sum_rating = 0;
        $average_rating = 0;
        if (count($all_results)>0){
        foreach ($all_results as $all_result) {
            $sum_rating+=$all_result->rating;
        }
        $average_rating =  number_format((float) $sum_rating/count($all_results), 1, '.', '');
        }
        //filter all results according to perspective
        $professional_results =  $all_results->filter(function ($results) {
            return $results->core_value_id == 'Professional';
        });
        $ethics_results =  $all_results->filter(function ($results) {
            return $results->core_value_id == 'Ethics';
        });
        $efficiency_results =  $all_results->filter(function ($results) {
            return $results->core_value_id == 'Efficiency';
        });
        $responsive_results =  $all_results->filter(function ($results) {
            return $results->core_value_id == 'Responsive';
        });

        //find average for each core value
        $sum_professional = 0;
        foreach ($professional_results as $professional_result) {
            $sum_professional += $professional_result->rating;
        }
        if(count($professional_results)>0){
        $average_professional = number_format((float)$sum_professional/count($professional_results), 1, '.', '');
        }
        else{
            $average_professional = 0;
        }

        $sum_ethics = 0;
        foreach ($ethics_results as $ethics_result) {
            $sum_ethics += $ethics_result->rating;
        }
        if(count($ethics_results)>0){
        $average_ethics = number_format((float)$sum_ethics/count($ethics_results), 1, '.', '');
        }
        else{
            $average_ethics = 0;
        }
        $sum_efficiency = 0;
        foreach ($efficiency_results as $efficiency_result) {
            $sum_efficiency += $efficiency_result->rating;
        }
        if(count($efficiency_results)>0){
        $average_efficiency = number_format((float)$sum_efficiency/count($efficiency_results), 1, '.', '');
        }
        else{
            $average_efficiency = 0;
        }
        $sum_responsive = 0;
        foreach ($responsive_results as $responsive_result) {
            $sum_responsive += $responsive_result->rating;
        }
        if(count($responsive_results)>0){
        $average_responsive = number_format((float)$sum_responsive/count($responsive_results), 1, '.', '');
        }
        else{
            $average_responsive = 0;
        }


        return view('pages.administrator.reports.administration',
    [
        'user_count'=>$user_count,
        'feedback_count'=>$feedback_count,
        'completed_count'=>$completed_count,
        'average_rating'=>$average_rating,
        'pending_count'=>$pending_count,
        'average_professional'=>$average_professional,
        'average_ethics'=>$average_ethics,
        'average_efficiency'=>$average_efficiency,
        'average_responsive'=>$average_responsive,
        'departments'=>$departments,
        'feedbacks'=>$feedbacks
    ]);
    }

    public function detail($sel){

        //all feedback requests
        if ($sel == 'feedback_requests'){
            $feedbacks = feedback_requests
        ::leftJoin('users', 'feedback_requests.user_id', '=', 'users.id')
        ->leftJoin('users AS users2', 'feedback_requests.feedback_provider', '=', 'users2.id')
        ->paginate(10, array('users.name', 'users.department_id', 'feedback_requests.status', 'feedback_requests.created_at','users2.name as provider'));

       

        return view('pages.administrator.reports.detail',
        [
            'feedbacks'=>$feedbacks,
            'sel'=>'requests'
        ]);
        }

        //completed feedbacks
        if ($sel == 'completed_feedbacks'){
            $feedbacks = feedback_requests
        ::leftJoin('users', 'feedback_requests.user_id', '=', 'users.id')
        ->leftJoin('users AS users2', 'feedback_requests.feedback_provider', '=', 'users2.id')
        ->where('feedback_requests.status', '=', 'Completed')
        ->paginate(10, array('users.name', 'users.department_id', 'feedback_requests.status', 'feedback_requests.updated_at','users2.name as provider'));
     
       

        return view('pages.administrator.reports.detail',
        [
            'feedbacks'=>$feedbacks,
            'sel'=>'completed'
        ]);
        }
    }
}
