@extends('layouts.backend.main')

@section('title', 'My Blog | Blog index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Blog Index</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.blog.index')}}">Blog</a> </li>
                <li class="active">All posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border clearfix">
                    <h3 class="box-title pull-left">Blogs</h3>
                    <div class="pull-left">
                        <a  class="btn btn-sm btn-success" href="{{route('backend.blog.create')}}"><i class="fa fa-plus"></i> Create blog</a>
                    </div>

                    <div class="pull-right">
                        <?php $links=[] ?>
                        @foreach($statusListLabel as $key => $value)
                            @if($value)
                                <?php $selected =  Request::get('status')==$key ? 'selected-status' : ''  ?>
                                <?php $links[] = "<a class='$selected' href=\"?status={$key}\">". ucwords($key) ."({$value})</a>" ?>
                            @endif
                        @endforeach
                       {!! implode(' | ', $links) !!}

                    </div>


                </div>
                <div class="box-body">
                    @include('backend.blog.message')
                    @if(!$posts->count())
                        <div class="alert alert-warning">
                            No records found!
                        </div>
                    @else
                        @if($onlyTrashed)
                            @include('backend.blog.trash-table')
                        @else
                            @include('backend.blog.table')
                        @endif
                    @endif

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $posts->appends(Request::query())->links() }}
                    </div>
                    <div class="pull-right">
                        <small>{{$postsCount}} Items</small>
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
