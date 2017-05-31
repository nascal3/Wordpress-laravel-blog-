@extends('layouts.backend.main')

@section('title', 'My Blog | Edit post')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Edit post</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.blog.index')}}">Blog</a> </li>
                <li class="active">edit post</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($post, [
                            "method" => "PUT",
                            "route" => ["backend.blog.update", $post->id],
                            "files" => TRUE,
                            "id" => "post-form"
                       ]) !!}

                <!-- Default box -->

                 @include('backend.blog.form')
                {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </section>


        <!-- /.content -->
    </div>
@endsection

@include('backend.blog.script')
