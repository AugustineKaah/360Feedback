<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User; 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:administrator_dashboard']);
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
            $administrators = User::role('administrator')->get();
            $managers = User::role('manager')->get();
            $users = User::All();
            
            return view('pages.administrator.permissions',
            [
                'administrators'=>$administrators,
                'managers'=>$managers,
                'users'=>$users
            ]);
        
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
        $role = $request->input('role');
      
        if($role=='Administrator'){
        $administrator = User::role('administrator')
        ->where('id',$user_id)
        ->get();
        $user = User::find($user_id);
        if (count($administrator)>0) {
        
            return redirect('/permissions')->withError($user->name.' is already an administrator');
        }else{
            $user = User::find($user_id);
            $user->assignRole('administrator');
            return redirect('/permissions')->withSuccess($user->name.' has been added to administrators group');
        }

        }
        if($role=='Manager'){
            $manager = User::role('manager')
            ->where('id',$user_id)
            ->get();
            $user = User::find($user_id);
            if (count($manager)>0) {
                return redirect('/permissions')->withError($user->name.' is already a manager');
            }else{
                
                $user->assignRole('manager');
                return redirect('/permissions')->withSuccess($user->name.' has been added to managers group');
            }
    
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //Using this function to revoke the permission of a manager which shouldn't have been the case
        $user = User::find($id);
        $user->removeRole('manager');
        return redirect('/permissions')->withSuccess($user->name.' has been removed from managers group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Revoke the permission of an administraator
        $user = User::find($id);
        $user->removeRole('administrator');
        return redirect('/permissions')->withSuccess($user->name.' has been removed from administrators group');
    }


    public function destroyManager($id)
    {
        
    }
}
