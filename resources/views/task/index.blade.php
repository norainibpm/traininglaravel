@extends('layouts.app')

@section('head')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="panel-body">
                    <table class="table" id="myTable">
                        <tr>
                            <td>Bil</td>
                            <td>Title</td>
                            <td>User</td>
                            <td>Due Date</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($tasks as $task )
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $task->title }}
                            </td>
                            <td>
                                {{ $task->user->name }}
                            </td>
                            <td>
                                {{ $task->due_date }}
                            </td>
                            <td>
                                <a href="{{ route('tasks.show',['task'=>$task->uuid])}}"class="btn btn-primary">Show</a>
                            </td>
                        </tr>

                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
