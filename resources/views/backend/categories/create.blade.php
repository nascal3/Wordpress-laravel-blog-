@extends('layouts.backend.main')

@section('title', 'My Blog | Add category')

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
                <li><a href="{{route('backend.categories.index')}}">Categories</a> </li>
                <li class="active">new category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                            "method" => "POST",
                            "route" => "backend.categories.store",
                            "files" => TRUE,
                            "id" => "category-form"
                       ]) !!}

                <!-- Default box -->

                 @include('backend.categories.form')
                {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </section>


        <!-- /.content -->
    </div>
@endsection

@include('backend.blog.script')
