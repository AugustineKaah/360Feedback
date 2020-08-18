<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profiles;
use App\Competency_Action_Selection;
use App\Feedback_Requests;
use Illuminate\Support\Facades\Auth;
use App\user;


class FeedbackController extends Controller
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
        $users = user::all();
        $profile = Auth::user();
        $employee_id = $profile->employee_id;
        $id = $profile->id;
        

        $requests = User
        ::join('feedback_requests', 'users.id', '=', 'feedback_requests.feedback_provider')
        ->select('users.name', 'feedback_requests.created_at', 'users.id', 'feedback_type')
        ->where([
            'feedback_requests.user_id'=> $id,
            ])
        ->getQuery()
        ->get();
       

        return view('pages.users.feedback.request',[
            'employee_id'=>$employee_id,
            'users'=>$users,
            'id'=>$id,
            'requests'=>$requests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'feedback_type'=>'required',
            'feedback_provider'=>'required'
        ]);

        //check if request has been sent to user already

        $existing = Feedback_requests::where(['user_id'=>$request->input('id') , 
        'feedback_provider'=> $request->input('feedback_provider')])->get();
        
        if(count($existing)>0){
            return redirect('/feedback')->withError('You have already sent a request to the selected provider');
        }
        
        $myrequest = new Feedback_Requests;
        $myrequest->user_id = $request->input('id');
        $myrequest->employee_id = $request->input('employee_id');
        $myrequest->feedback_type = $request->input('feedback_type');
        $myrequest->feedback_provider = $request->input('feedback_provider');
        $myrequest->status = 'Pending';
        $myrequest->save();
   
        return redirect('/feedback')->withSuccess('Feedback request sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        echo $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submitFeedback()
    {
        $myId = Auth::id();

        $requests = User
        ::join('feedback_requests', 'users.id', '=', 'feedback_requests.user_id')
        ->select('users.name', 'feedback_requests.created_at', 'feedback_type','feedback_requests.id')
        ->where([
            'feedback_requests.feedback_provider'=> $myId,
            'Status'=>'Pending'
            ])
        ->getQuery()
        ->get();

        $completed_requests = User
        ::join('feedback_requests', 'users.id', '=', 'feedback_requests.user_id')
        ->select('users.name', 'feedback_requests.created_at', 'feedback_requests.updated_at', 'feedback_type','feedback_requests.id')
        ->where([
            'feedback_requests.feedback_provider'=> $myId,
            'Status'=>'Completed'
            ])
        ->getQuery()
        ->get();
      
        
        return view ('pages.users.feedback.submit_1',[
        'feedbacks'=> $requests,
        'completed'=>$completed_requests
        ]);
    }

    public function routeSubmitFeedback($id)
    {
       echo $id;
    }
}
