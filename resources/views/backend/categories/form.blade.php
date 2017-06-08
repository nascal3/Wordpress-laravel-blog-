<div class="col-xs-9">
    <div class="box">
        <div class="box-header with-border clearfix">
            <h3 class="box-title pull-left">New post</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}

                @if($errors->has('title'))
                    <span class="help-block">{{$errors->first('title')}}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                {!! Form::label('Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control',  'id' => 'slug']) !!}
                @if($errors->has('slug'))
                    <span class="help-block">{{$errors->first('slug')}}</span>
                @endif
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button class="btn btn-primary" type="submit">{{$category->exists ? 'update category' : 'create category'}}</button>
        </div>
    </div>
</div>

