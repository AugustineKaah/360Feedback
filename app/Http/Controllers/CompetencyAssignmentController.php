<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Competency_Actions;
use App\Competencies;
use App\Competency_Actions_Selection;
use Illuminate\Support\Facades\Auth;

class CompetencyAssignmentController extends Controller
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
        $bcompetencies = Competencies::All();
        $myArray = [];
        
        foreach ($bcompetencies as $key => $value) {
            array_push($myArray, $value->competency);
        }

       // return($myArray);
        $this->validate($request, [
          
        ]);
        
        foreach ($bcompetencies as $competency) {
           
           $selection = new Competency_Actions_Selection;
           $selection->email=$request->input('email');
           $selection->value = $request->input(str_replace(' ', '_',$competency->competency));
           $selection->competency = $competency->competency;
           $selection->core_value = $competency->core_value_id;
            $selection->user_id = $request->input('user_id');
           $selection->save();
           
        }
    
        return redirect('/my_subordinates')->withSuccess('Competency assignment saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $existing = competency_actions_selection::where('user_id', $id)->get();
        
        
        $profile = user::find($id);

        //redirect to home pa1ge if logged-in user is not the manager
        if($profile->manager != Auth::id()){
            return redirect('home');
        }
        $bcompetencies = Competencies::All();
        //filter competencies according to core values
        $bprofessional = $bcompetencies->filter(function ($competency) {
            return $competency->core_value_id == 'Professional';
        });
        $bethics = $bcompetencies->filter(function ($competency) {
            return $competency->core_value_id == 'Ethics';
        });
        $befficiency = $bcompetencies->filter(function ($competency) {
            return $competency->core_value_id == 'Efficiency';
        });
        $bresponsive = $bcompetencies->filter(function ($competency) {
            return $competency->core_value_id == 'Responsive';
        });


        $competencies = Competency_Actions::All();
        $professional = $competencies->filter(function ($competency) {
            return $competency->core_value == 'Professional';
        });
        $ethics = $competencies->filter(function ($competency) {
            return $competency->core_value == 'Ethics';
        });
        $efficiency = $competencies->filter(function ($competency) {
            return $competency->core_value == 'Efficiency';
        });
        $responsive = $competencies->filter(function ($competency) {
            return $competency->core_value == 'Responsive';
        });

        if(count($existing)>0){
            return view('pages.users.subordinates.competency_assignment', [
                'professional'=>$professional, 
                'ethics'=>$ethics,
                'efficiency'=>$efficiency,
                'responsive'=>$responsive,
                'pcompetencies'=>$bprofessional,
                'ethcompetencies'=>$bethics,
                'effcompetencies'=>$befficiency,
                'rescompetencies'=>$bresponsive,
                'profile'=>$profile,
                'mv'=>'3',
                'existing'=>$existing
                ]);
        }

        return view('pages.users.subordinates.competency_assignment', [
            'professional'=>$professional, 
            'ethics'=>$ethics,
            'efficiency'=>$efficiency,
            'responsive'=>$responsive,
            'pcompetencies'=>$bprofessional,
            'ethcompetencies'=>$bethics,
            'effcompetencies'=>$befficiency,
            'rescompetencies'=>$bresponsive,
            'profile'=>$profile,
            'mv'=>'3',
            'existing'=>''
            ]);
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
        $existing = competency_actions_selection::where('user_id', $id)->get();
        foreach ($existing as $key => $value) {
            $input_name = preg_replace('/[^a-zA-Z0-9-\.]/', '_', $value->competency);
            $value->value = $request->input($input_name);
            $value->save();
           
        }
        return redirect("/my_subordinates")->withSuccess(' Competency Assignment saved');
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
}
