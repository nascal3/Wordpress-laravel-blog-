@extends('layouts.backend.main')

@section('title', 'My Blog | Edit account')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Edit account</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit account</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                            "method" => "PUT",
                            "url" => "/edit-account",
                            "id" => "userAcc-form"
                       ]) !!}

                <!-- Default box -->

                 @include('backend.users.form', ['hideRoleDropdown' => true])
                {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </section>


        <!-- /.content -->
    </div>
@endsection


