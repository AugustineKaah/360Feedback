<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 

class FetchController extends Controller
{
    
    public function index()
{
    return view('autocomplete');
}


public function fetch(Request $request)
{

 if($request->get('query'))
 {
  $query = $request->get('query');
  $users = User::find(1);

  $data = User::where('name', 'LIKE', "%{$query}%")
    ->get();
    
  $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
  foreach($data as $row)
  {
   $output .= '
   <li  id="'.$row->id.'" data-department="'.$row->department_id.'"><a href="#">'.$row->name.'</a></li>
   ';
  }
  $output .= '</ul>';
  echo $output;
 }
}




}