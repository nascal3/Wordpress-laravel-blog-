@extends('layouts.backend.main')

@section('title', 'My Blog | Delete confirmation')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Delete confirmation</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.users.index')}}">Users</a> </li>
                <li class="active">Delete user confirmation</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                            "method" => "DELETE",
                            "route" => ["backend.users.destroy", $user->id]
                       ]) !!}

                <!-- Default box -->

                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body">
                            <p>You are about to delete this user:</p>
                            <p>{{$user->name}} : {{$user->email}}</p>
                            <p>What should be done with users content?</p>
                            <p><input type="radio" name="delete_option" value="delete" checked>Delete all content</p>
                            <p><input type="radio" name="delete_option" value="attribute">Attribute content to selected user</p>
                            {{ Form::select('selected_user', $users, null,['class' => 'form-control']) }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">
                               Confirm delete
                            </button>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </section>


        <!-- /.content -->
    </div>
@endsection


