@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

@endsection

@section('pagetitle', 'Tasks')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript: void(0);">Todolist</a></li>
    <li class="breadcrumb-item active">Tasks</li>

@endsection

@section('content')
<div class="container">
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
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
{{-- <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> --}}
<script>
    $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('tasks.ajaxloadtasks') }}",
                method: 'POST',
                data: function(d){
                    d._token = "{{ csrf_token() }}";
                }
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'due_date'
                },
                {
                    data: 'action'
                }
            ]
        });
</script>

@endsection
