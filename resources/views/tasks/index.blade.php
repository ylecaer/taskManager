@extends('layout.layout')
 
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Task Title</th>
              <th scope="col">Task Description</th>
              <th scope="col">Status</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <th scope="row">{{$task->id}}</th>
              <td><a href="/tasks/{{$task->id}}">{{$task->title}}</a></td>
              <td>{{$task->description}}</td>
              @if ($task->status)
                <td><span class="badge badge-success">Done</span></td>
              @else
                <td><span class="badge badge-warning">Pending</span></td>
              @endif              
              <td>{{$task->created_at->toFormattedDateString()}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('tasks/' . $task->id . '/edit') }}">
                    <button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;
                  <form action="{{url('tasks', [$task->id])}}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                 </form>&nbsp;
                 <form action="{{ route('toggleStatusName', $task->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="status" value="{{$task->status}}">
                    <input type="submit" class="btn btn-info" value="Toggle Status"/>
   				        </form>
            </div>
 </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection