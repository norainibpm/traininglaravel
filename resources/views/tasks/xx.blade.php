@extends('layouts.app')

@section('head')
@endsection

@section('tabtitle', 'Tajuk')
@section('pagetitle', 'Tajuk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript: void(0);">Todolist</a></li>
    <li class="breadcrumb-item active">Tajuk</li>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="card-header">Tajuk</div>
                <div class="card-body">
                 Tajuk
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
