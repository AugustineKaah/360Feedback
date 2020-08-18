@extends('layouts.app')

@section('content')

@foreach ($core_values as $core_value)
<a href="/core_values/{{$core_value->core_value_id}}"> {{$core_value->core_value}}</a>
@endforeach

@endsection
        

   

