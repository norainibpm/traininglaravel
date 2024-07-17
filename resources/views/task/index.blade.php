@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

@endsection

@section('content')
<div class="container">
</div>
@endsection

    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="panel-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>


                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
    $('#myTable').DataTable();
</script>

@endsection
