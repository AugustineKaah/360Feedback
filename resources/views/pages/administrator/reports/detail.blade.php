@extends('layouts.app')

@section('header')
  Reports  
@endsection
@section('content')
@if ($sel == 'requests')

@if (count($feedbacks)==0)
    <p>There are no feedback requests</p>
@else
<table class="table table-bordered">
    <thead class="bg-blue">
        <tr>
            <th>Feedback Requestor</th>
            <th>Date of Request</th>
            <th>Feedback Provider</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feedbacks as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{date_format($item->created_at,"d/m/Y") }}</td>
        <td>{{$item->provider}}</td>
        <td>{{$item->status}}</td>
        </tr>
        
    @endforeach
    </tbody>
</table>
    {{ $feedbacks->links()}}
        
@endif
@endif


@if ($sel == 'completed')

@if (count($feedbacks)==0)
    <p>There are no feedback requests</p>
@else
<table class="table table-bordered">
    <thead class="bg-blue">
        <tr>
            <th>Feedback Requestor</th>
            <th>Date of Request</th>
            <th>Feedback Provider</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feedbacks as $item)
        <tr>
            <td>{{ $item->name }}</td>
        <td>{{date_format($item->updated_at,"d/m/Y") }}</td>
        <td>{{$item->provider}}</td>
        <td>{{$item->status}}</td>
        </tr>
        
    @endforeach
    </tbody>
</table>
    {{ $feedbacks->links() }}
        
@endif
@endif



@endsection