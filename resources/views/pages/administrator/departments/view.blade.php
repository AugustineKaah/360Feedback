@extends('layouts.app');

@section('content')
<style>
form{
    margin: 0;
}
form >button >i{
    height: 15;
}
form >button{
    border: none;
    background: transparent
}
</style>
<div class="card" >
    <div class="card-body">
        <a href="/departments/create" class="float">
            <span class=" my-float">+</span>
            </a>
<table class="table table-striped table-sm">
<thead class="background-success">
    <tr class="bg-primary">
    <th style="padding:15px">Department</th>
    <th></th>
    <th></th>
    </tr>
</thead>
<tbody>
    @foreach ($departments as $department)
<tr>
    <td>{{$department->department}}</td>
    <td>
        
        {!! Form::open(['action' => ['DepartmentsController@edit',$department->department_id], 'method' => 'GET'])!!}
            <button type="submit" >
                <i class="fa fa-pencil menu-icon"></i>
            </button>
        {!! Form::close() !!}
    </td>
    <td>
        {!! Form::open(['action' => ['DepartmentsController@destroy',$department->department_id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        
    
    <button type="submit" id="delete" onclick="return confirm('Are you sure?')">
        <i class="fa fa-delete menu-icon delete"></i>
    </button>

 

        {!! Form::close() !!}
    
    </td>

    </tr>
@endforeach
</tbody>
</table>
<style>
.delete{
    color: red;
    cursor: pointer;
    
}
.delete:hover{
    color: grey
}

.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
    box-shadow: 2px 2px 3px #999;
    font-weight: bold;
    font-size: 50px;
    
}

.my-float{
    margin-top:22px;
    text-decoration: none !important;
    color: white !important;
}

.my-float:hover{
    text-decoration: none !important;;
    color: white !important;
}

</style>

    </div>
</div> 


@endsection