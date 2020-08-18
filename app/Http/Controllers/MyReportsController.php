<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedback_requests;
use App\feedback_result;
use App\competency_actions_selection;
use App\user;
use App\feedback_results_view_2;
use Illuminate\Support\Facades\Auth;

class MyReportsController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function myReports()
    {

        $user = Auth::id();

        $professional_results = feedback_results_view_2
        ::where([
            'core_value'=>'Professional',
            'user_id'=>$user
        ])
        ->getQuery()
        ->get();

        $ethics_results = feedback_results_view_2
        ::where([
            'core_value'=>'Ethics',
            'user_id'=>$user
        ])
        ->getQuery()
        ->get();

        $efficiency_results = feedback_results_view_2
        ::where([
            'core_value'=>'Efficiency',
            'user_id'=>$user
        ])
        ->getQuery()
        ->get();

        $responsive_results = feedback_results_view_2
        ::where([
            'core_value'=>'Responsive',
            'user_id'=>$user
        ])
        ->getQuery()
        ->get();

        
/*
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

        //Radar chart data
        //filter results according to feedback type and find average

        //Professional Top-Down
        $professional_top = $professional_results->filter(function ($results) {
            return $results->feedback_type == 'Top-Down';
        });
        //check if query returned data
        if(count($professional_top)>0){
        $sum_professional_top = 0;
        //loop through returned data and add up the ratings
        foreach ($professional_top as $prof_top) {
            $sum_professional_top += $prof_top->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_professional_top = number_format((float)$sum_professional_top/count($professional_top), 1, '.', '');
        }
        else{
            $average_professional_top = 0;
        }
        
        //Ethics Top-Down
        $ethics_top = $ethics_results->filter(function ($results) {
            return $results->feedback_type == 'Top-Down';
        });
        //check if query returned data
        if(count($ethics_top)>0){
        $sum_ethics_top = 0;
        //loop through returned data and add up the ratings
        foreach ($ethics_top as $ethic_top) {
            $sum_ethics_top += $ethic_top->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_ethics_top = number_format((float)$sum_ethics_top/count($ethics_top), 1, '.', '');
        }
        else{
            $average_ethics_top = 0;
        }


        //Efficiency Top-Down
        $efficiency_top = $efficiency_results->filter(function ($results) {
            return $results->feedback_type == 'Top-Down';
        });
        //check if query returned data
        if(count($efficiency_top)>0){
        $sum_efficiency_top = 0;
        //loop through returned data and add up the ratings
        foreach ($efficiency_top as $eff_top) {
            $sum_efficiency_top += $eff_top->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_efficiency_top = number_format((float)$sum_efficiency_top/count($efficiency_top), 1, '.', '');
        }
        else{
            $average_efficiency_top = 0;
        }

        //Responsive Top-Down
        $responsive_top = $responsive_results->filter(function ($results) {
            return $results->feedback_type == 'Top-Down';
        });
        //check if query returned data
        if(count($responsive_top)>0){
        $sum_responsive_top = 0;
        //loop through returned data and add up the ratings
        foreach ($responsive_top as $res_top) {
            $sum_responsive_top += $res_top->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_responsive_top = number_format((float)$sum_responsive_top/count($responsive_top), 1, '.', '');
        }
        else{
            $average_responsive_top = 0;
        }


        //Peer feedback
        
        //Professional Peer
        $professional_peer = $professional_results->filter(function ($results) {
            return $results->feedback_type == 'Peer';
        });
        //check if query returned data
        if(count($professional_peer)>0){
        $sum_professional_peer = 0;
        //loop through returned data and add up the ratings
        foreach ($professional_peer as $prof_peer) {
            $sum_professional_peer += $prof_peer->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_professional_peer = number_format((float)$sum_professional_peer/count($professional_peer), 1, '.', '');
        }
        else{
            $average_professional_peer = 0;
        }
        
        //Ethics Peer
        $ethics_peer = $ethics_results->filter(function ($results) {
            return $results->feedback_type == 'Peer';
        });
        //check if query returned data
        if(count($ethics_peer)>0){
        $sum_ethics_peer = 0;
        //loop through returned data and add up the ratings
        foreach ($ethics_peer as $ethic_peer) {
            $sum_ethics_peer += $ethic_peer->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_ethics_peer = number_format((float)$sum_ethics_peer/count($ethics_peer), 1, '.', '');
        }
        else{
            $average_ethics_peer = 0;
        }


        //Efficiency Peer
        $efficiency_peer = $efficiency_results->filter(function ($results) {
            return $results->feedback_type == 'Peer';
        });
        //check if query returned data
        if(count($efficiency_peer)>0){
        $sum_efficiency_peer = 0;
        //loop through returned data and add up the ratings
        foreach ($efficiency_peer as $eff_peer) {
            $sum_efficiency_peer += $eff_peer->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_efficiency_peer = number_format((float)$sum_efficiency_peer/count($efficiency_peer), 1, '.', '');
        }
        else{
            $average_efficiency_peer = 0;
        }

        //Responsive Peer
        $responsive_peer = $responsive_results->filter(function ($results) {
            return $results->feedback_type == 'Peer';
        });
        //check if query returned data
        if(count($responsive_peer)>0){
        $sum_responsive_peer = 0;
        //loop through returned data and add up the ratings
        foreach ($responsive_peer as $res_peer) {
            $sum_responsive_peer += $res_peer->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_responsive_peer = number_format((float)$sum_responsive_peer/count($responsive_peer), 1, '.', '');
        }
        else{
            $average_responsive_peer = 0;
        }
       

        //Bottom-Up
        //Professional Bottom-Up
        $professional_bottom = $professional_results->filter(function ($results) {
            return $results->feedback_type == 'Bottom-Up';
        });
        //check if query returned data
        if(count($professional_bottom)>0){
        $sum_professional_bottom = 0;
        //loop through returned data and add up the ratings
        foreach ($professional_bottom as $prof_bottom) {
            $sum_professional_bottom += $prof_bottom->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_professional_bottom = number_format((float)$sum_professional_bottom/count($professional_bottom), 1, '.', '');
        }
        else{
            $average_professional_bottom = 0;
        }
        
        //Ethics Bottom
        $ethics_bottom = $ethics_results->filter(function ($results) {
            return $results->feedback_type == 'Bottom';
        });
        //check if query returned data
        if(count($ethics_bottom)>0){
        $sum_ethics_bottom = 0;
        //loop through returned data and add up the ratings
        foreach ($ethics_bottom as $ethic_bottom) {
            $sum_ethics_bottom += $ethic_bottom->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_ethics_bottom = number_format((float)$sum_ethics_bottom/count($ethics_bottom), 1, '.', '');
        }
        else{
            $average_ethics_bottom = 0;
        }


        //Efficiency Bottom
        $efficiency_bottom = $efficiency_results->filter(function ($results) {
            return $results->feedback_type == 'Bottom-Up';
        });
        //check if query returned data
        if(count($efficiency_bottom)>0){
        $sum_efficiency_bottom = 0;
        //loop through returned data and add up the ratings
        foreach ($efficiency_bottom as $eff_bottom) {
            $sum_efficiency_bottom += $eff_bottom->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_efficiency_bottom = number_format((float)$sum_efficiency_bottom/count($efficiency_bottom), 1, '.', '');
        }
        else{
            $average_efficiency_bottom = 0;
        }

        //Responsive bottom
        $responsive_bottom = $responsive_results->filter(function ($results) {
            return $results->feedback_type == 'Bottom';
        });
        //check if query returned data
        if(count($responsive_bottom)>0){
        $sum_responsive_bottom = 0;
        //loop through returned data and add up the ratings
        foreach ($responsive_bottom as $res_bottom) {
            $sum_responsive_bottom += $res_bottom->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_responsive_bottom = number_format((float)$sum_responsive_bottom/count($responsive_bottom), 1, '.', '');
        }
        else{
            $average_responsive_bottom = 0;
        }
       

        //Self
        //Professional Self
        $professional_self = $professional_results->filter(function ($results) {
            return $results->feedback_type == 'Self';
        });
        //check if query returned data
        if(count($professional_self)>0){
        $sum_professional_self = 0;
        //loop through returned data and add up the ratings
        foreach ($professional_self as $prof_self) {
            $sum_professional_self += $prof_self->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_professional_self = number_format((float)$sum_professional_self/count($professional_self), 1, '.', '');
        }
        else{
            $average_professional_self = 0;
        }
        
        //Ethics self
        $ethics_self = $ethics_results->filter(function ($results) {
            return $results->feedback_type == 'Self';
        });
        //check if query returned data
        if(count($ethics_self)>0){
        $sum_ethics_self = 0;
        //loop through returned data and add up the ratings
        foreach ($ethics_self as $ethic_self) {
            $sum_ethics_self += $ethic_self->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_ethics_self = number_format((float)$sum_ethics_self/count($ethics_self), 1, '.', '');
        }
        else{
            $average_ethics_self = 0;
        }


        //Efficiency self
        $efficiency_self = $efficiency_results->filter(function ($results) {
            return $results->feedback_type == 'Self';
        });
        //check if query returned data
        if(count($efficiency_self)>0){
        $sum_efficiency_self = 0;
        //loop through returned data and add up the ratings
        foreach ($efficiency_self as $eff_self) {
            $sum_efficiency_self += $eff_self->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_efficiency_self = number_format((float)$sum_efficiency_self/count($efficiency_self), 1, '.', '');
        }
        else{
            $average_efficiency_self = 0;
        }

        //Responsive self
        $responsive_self = $responsive_results->filter(function ($results) {
            return $results->feedback_type == 'Self';
        });
        //check if query returned data
        if(count($responsive_self)>0){
        $sum_responsive_self = 0;
        //loop through returned data and add up the ratings
        foreach ($responsive_self as $res_self) {
            $sum_responsive_self += $res_self->rating;
        }
        //Compute average of results by dividing sum of results by number of result items
        $average_responsive_self = number_format((float)$sum_responsive_self/count($responsive_self), 1, '.', '');
        }
        else{
            $average_responsive_self = 0;
        }
       */

        $selections = competency_actions_selection::where([
            'user_id'=>$user
        ])->get();

        foreach ($selections as $selection) {
            $exx = $selection->competency;
            $professional_results->filter(function ($results, $exx) {
                //return $selection;
              // return $results->competency == $exx;
            }).'';
        }

        return view('pages.users.feedback.my_reports',[
            'professional_results'=>$professional_results,
            'ethics_results'=>$ethics_results,
            'efficiency_results'=>$efficiency_results,
            'responsive_results'=>$responsive_results,
            'selections'=>$selections
        ]);
    }
    
}
