@extends('layouts.backend.main')

@section('title', 'My Blog | Add new post')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Add new post</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.blog.index')}}">Blog</a> </li>
                <li class="active">Add new post</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border clearfix">
                    <h3 class="box-title pull-left">New post</h3>
                     <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                   {!! Form::model($post, [
                        "method" => "POST",
                        "route" => "backend.blog.store",
                        "files" => TRUE
                   ]) !!}

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        {!! Form::label('Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}

                        @if($errors->has('title'))
                           <span class="help-block">{{$errors->first('title')}}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        {!! Form::label('Slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                        @if($errors->has('slug'))
                            <span class="help-block">{{$errors->first('slug')}}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                        {!! Form::label('Excerpt') !!}
                        {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
                        @if($errors->has('excerpt'))
                            <span class="help-block">{{$errors->first('excerpt')}}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                        {!! Form::label('Body') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        @if($errors->has('body'))
                            <span class="help-block">{{$errors->first('body')}}</span>
                        @endif
                    </div>

                    <div class="form-group" {{ $errors->has('published_at') ? 'has-error' : '' }}>
                        {!! Form::label('Published at') !!}
                        {!! Form::text('published_at', null, ['class' => 'form-control']) !!}
                        @if($errors->has('published_at'))
                            <span class="help-block">{{$errors->first('published_at')}}</span>
                        @endif
                    </div>

                    <div class="form-group" {{ $errors->has('category_id') ? 'has-error' : '' }}>
                        {!! Form::label('category') !!}
                        {!! Form::select('category_id', App\category::pluck('title','id') , null,['class' => 'form-control', 'placeholder' => 'Choose category']) !!}
                        @if($errors->has('category_id'))
                            <span class="help-block">{{$errors->first('category_id')}}</span>
                        @endif
                    </div>

                    <div class="form-group" {{ $errors->has('image') ? 'has-error' : '' }}>
                        {!! Form::label('image', 'Feature image') !!}
                        {!! Form::file('image') !!}
                        @if($errors->has('category_id'))
                            <span class="help-block">{{$errors->first('image')}}</span>
                        @endif
                    </div>

                    <hr>
                    {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}


                   {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
             </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script type="application/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
