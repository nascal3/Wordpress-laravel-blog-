@extends('layouts.backend.main')

@section('title', 'My Blog | Edit post')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Edit category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.categories.index')}}">All categories</a> </li>
                <li class="active">edit category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                            "method" => "PUT",
                            "route" => ["backend.categories.update", $category->id],
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

@include('backend.categories.script')
