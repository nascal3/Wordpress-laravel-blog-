@extends('layouts.backend.main')

@section('title', 'My Blog | Add user')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Add new category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.users.index')}}">Users</a> </li>
                <li class="active">New user</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                            "method" => "POST",
                            "route" => "backend.users.store",
                            "files" => TRUE,
                            "id" => "user-form"
                       ]) !!}

                <!-- Default box -->

                 @include('backend.users.form')
                {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </section>


        <!-- /.content -->
    </div>
@endsection


