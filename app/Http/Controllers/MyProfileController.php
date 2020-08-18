<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profiles;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\departments;

class MyProfileController extends Controller
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
       
         return $this->show(1);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.profiles.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profiles;
        $profile->firstname = $request->input('firstname');
        $profile->middlename = $request->input('middlename');
        $profile->surname = $request->input('surname');
        $profile->email = $request->input('email');
        $profile->mobile_number = $request->input('phone_number');
        $profile->employee_id = $request->input('employee_id');
        $profile->grade = $request->input('grade_level');
        $profile->manager = $request->input('manager');
        $profile->job_title = $request->input('job_title');
    
        $profile->save();
        return $this->index();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        
        try {
            $user->department_name = $user->department->department;
        } catch (\Throwable $th) {
            
        }
        
        try {
            $user->manager_name = $user->managerGet->name;
           
        } catch (\Throwable $th) {
            
        }

        return view('pages.users.profiles.view',[
        'user'=>$user,
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myEdit()
    {
       $id = Auth::user()->id;
        $departments = departments::all();
        $user = user::find($id);
        try {
            $user->department_name = $user->department->department;
        } catch (\Throwable $th) {
            
        }
        
        try {
            $user->manager_name = $user->managerGet->name;
           
        } catch (\Throwable $th) {
            
        }
        return view ('pages.users.profiles.edit',[
            'user'=> $user,
            'departments'=>$departments,
 
        ]);
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
        
        $user = user::find($id);
        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->employee_id = $request->input('employee_id');
        $user->department_id = $request->input('department');
        $user->mobile_number = $request->input('mobile_number');
        $user->manager = $request->input('manager');
        $user->job_title = $request->input('job_title');
        $user->grade = $request->input('grade_level');

        $user->save();
        
        return redirect("/myprofile")->withSuccess(' Profile Updated');
        
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

    public function mySubs(){
        $myId = Auth::id();
        
        $profiles = user::where('manager' , $myId)->get();
        return view('pages.users.subordinates.my_subordinates')->with('profiles', $profiles);
    }

    public function mySubsView($id){
        $profile = user::find($id);
        if($profile->manager != Auth::id()){
            return redirect('home');
        }
        return view('pages.users.subordinates.view_profile')->with('profile', $profile);
    }
}
