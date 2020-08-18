<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departments;

class DepartmentsController extends Controller
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
        $departments = Departments::All();
        
        return view ('pages.administrator.departments.view')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administrator.departments.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department'=>'required'
        ]);
        
        $department = new Departments;
        $department->department = $request->input('department');
        $department->save();
        return redirect('/departments');
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
        
        $department = Departments::where('department_id', $id)->first();
        return view('pages.administrator.departments.edit')->with('department', $department);
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
    
    return($request->input('department'));
    $this->validate($request, [
        'department'=>'required'
    ]);
    return('true');
       $department = Departments::find($id);
        //$department = Departments::where('department_id', 2)->first()-get();
        $department->department = $request->input('department');
        $department -> save();
return ('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Departments::find($id);
        //$department = Departments::where('department_id', 2)->first()-get();
        $department -> delete();
        return redirect('/departments');
    }
}
