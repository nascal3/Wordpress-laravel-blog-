@extends('layouts.backend.main')

@section('title', 'My Blog | Edit user')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Edit user</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.users.index')}}">All users</a> </li>
                <li class="active">Edit user</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                            "method" => "PUT",
                            "route" => ["backend.users.update", $user->id],
                            "files" => TRUE,
                            "id" => "userEdit-form"
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


