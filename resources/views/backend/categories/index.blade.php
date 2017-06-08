@extends('layouts.backend.main')

@section('title', 'My Blog | Categories')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Category Index</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.categories.index')}}">Blog</a> </li>
                <li class="active">All categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border clearfix">
                    <h3 class="box-title pull-left"></h3>
                    <div class="pull-left">
                        <a  class="btn btn-sm btn-success" href="{{route('backend.categories.create')}}"><i class="fa fa-plus"></i> Create category</a>
                    </div>

                    <div class="pull-right">


                    </div>


                </div>
                <div class="box-body">
                    @include('backend.partials.message')
                    @if(!$categories->count())
                        <div class="alert alert-warning">
                            No records found!
                        </div>
                    @else
                        @include('backend.categories.table')
                    @endif

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $categories->links() }}
                    </div>
                    <div class="pull-right">
                        <small>{{$categoriesCount}} Items</small>
                    </div>
                </div>
                <!-- /.box-footer-->
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
