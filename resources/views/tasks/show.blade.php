@extends('layout.layout')
 
@section('content')
            
    <h1>Showing Task {{ $task->title }}</h1>
    <div class="jumbotron">
        <table class="table">
            <tr><td><strong>Task Title:</strong></td><td>{{ $task->title }}</td></tr>
            <tr><td><strong>Description:</strong></td><td>{{ $task->description }}</td></tr>
            <tr><td><strong>Status:</strong></td>
            @if ($task->status)
                <td><span class="badge badge-success">Done</span></td>
            @else
                <td><span class="badge badge-warning">Pending</span></td>
            @endif              
        </table>
    </div>
@endsection