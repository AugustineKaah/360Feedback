<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback_Requests;
use App\Competency_Actions_Selection;
use App\Competency_Actions;
use App\feedback_selection_view;
use App\core_values;
use App\feedback_result;
use Illuminate\Support\Facades\Auth;
use App\user;

class SubmitFeedbackFormController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user_id = $request->input('user_id');
        //Create feedback request for manager
        if ($request->input('feedback_id')==0) {
        $myrequest = new Feedback_Requests;
        $myrequest->user_id = $user_id;
        $myrequest->employee_id = user::find($user_id)->employee_id;
        $myrequest->feedback_type = 'Top-Down';
        $myrequest->feedback_provider = Auth::id();
        $myrequest->status = 'Completed';
        $myrequest->save();
        }
        
        if ($request->input('feedback_id')==$user_id) { 
            $myrequest = new Feedback_Requests;
            $myrequest->user_id = $user_id;
            $myrequest->employee_id = user::find($user_id)->employee_id;
            $myrequest->feedback_type = 'Self';
            $myrequest->feedback_provider = Auth::id();
            $myrequest->status = 'Completed';
            $myrequest->save();
            }
           
        $competencies = feedback_selection_view::where('user_id',$user_id)->get();
        foreach ($competencies as $competency) {
            $item = new feedback_result; 
            if ($request->input('feedback_id')==0) {
            $item->feedback_id = $myrequest->id;
            }
            else{
            $item->feedback_id = $request->input('feedback_id');
            }
            $item->competency = $competency->competency;
            $item->competency_level = $competency->value;
            $item->rating = $request->input(str_replace(' ', '_',$competency->competency));
            
            $item->save();
        }

        $feedback_id = $request->input('feedback_id');
        if ($request->input('feedback_id')==0) {
            $feedback_id = $myrequest->id;
        }
        $item = feedback_requests::find($feedback_id);
        $item->status = 'Completed';
        $item->save();
        if ($request->input('feedback_id')==0) {
            return redirect('/my_subordinates')->withSuccess('Competency assessment submitted');
            }
        return redirect('/submit_feedback')->withSuccess('Competency assessment submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $feedback = Feedback_Requests::find($id);
        $user_id = $feedback->user_id;
        $user = user::find($user_id)->name;
        if($feedback->feedback_provider != Auth::id()){
            return redirect('home');
        }

        
       $competencies = feedback_selection_view::where('user_id', $user_id)->get();

       $competencies_professional = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Professional';
        });
  
        $competencies_ethics = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Ethics';
        });
        $competencies_efficiency = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Efficiency';
        });
        $competencies_responsive = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Responsive';
        });
        $core_values = core_values::All();
    
        return view('pages.users.feedback.submit_2',
        ['competencies_professional'=> $competencies_professional,
        'competencies_ethics'=> $competencies_ethics,
        'competencies_efficiency'=> $competencies_efficiency,
        'competencies_responsive'=> $competencies_responsive,
         'core_values'=> $core_values,
         'user'=>$user,
         'user_id'=>$user_id,
         'feedback_id'=>$id]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = Feedback_Requests::find($id);
        $feedback->status = 'Completed';
        $feedback->save();
        echo 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function subordinate_feedback($id){

        $existing = feedback_requests::where([
            'user_id'=>$id,
            'feedback_provider'=>Auth::id()
        ])->get();
        if(count($existing)>0){
            return redirect('/my_subordinates')->withError('You have already completed assessment for '.user::find($id)->name);
        }
        $user = user::find($id)->name;
        $competencies = feedback_selection_view::where('user_id', $id)->get();

       $competencies_professional = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Professional';
        });
  
        $competencies_ethics = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Ethics';
        });
        $competencies_efficiency = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Efficiency';
        });
        $competencies_responsive = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Responsive';
        });
        $core_values = core_values::All();
    
        return view('pages.users.feedback.submit_2',
        ['competencies_professional'=> $competencies_professional,
        'competencies_ethics'=> $competencies_ethics,
        'competencies_efficiency'=> $competencies_efficiency,
        'competencies_responsive'=> $competencies_responsive,
         'core_values'=> $core_values,
         'user'=>$user,
         'user_id'=> $id,
         'feedback_id'=>0]);
       
    }

    public function self_assessment(){
        $id = Auth::id();
        $existing = feedback_requests::where([
            'user_id'=>$id,
            'feedback_provider'=>$id
        ])->get();
        if(count($existing)>0){
            return view('pages.users.feedback.self')->withError('You have already completed your self assessment');
        }
        $user = user::find($id)->name;
        $competencies = feedback_selection_view::where('user_id', $id)->get();

       $competencies_professional = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Professional';
        });
  
        $competencies_ethics = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Ethics';
        });
        $competencies_efficiency = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Efficiency';
        });
        $competencies_responsive = $competencies->filter(function ($competency) {
        return $competency->core_value == 'Responsive';
        });
        $core_values = core_values::All();
    
        return view('pages.users.feedback.submit_2',
        ['competencies_professional'=> $competencies_professional,
        'competencies_ethics'=> $competencies_ethics,
        'competencies_efficiency'=> $competencies_efficiency,
        'competencies_responsive'=> $competencies_responsive,
         'core_values'=> $core_values,
         'user'=>$user,
         'user_id'=> $id,
         'feedback_id'=>0]);
       
    }

}
