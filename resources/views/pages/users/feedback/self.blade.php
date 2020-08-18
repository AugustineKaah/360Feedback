@extends('layouts.app')
@section('header')
  Self Assessment  
@endsection

@section('content')
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Error!</strong>  You have already completed your self assessment
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endsection