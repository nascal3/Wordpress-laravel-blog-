<div class="col-xs-9">
    <div class="box">
        <div class="box-header with-border clearfix">
            <h3 class="box-title pull-left">New user</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}

                @if($errors->has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control',  'id' => 'email']) !!}
                @if($errors->has('email'))
                    <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                {!! Form::label('Password') !!}
                {!! Form::password('password',  ['class' => 'form-control',  'id' => 'password']) !!}
                @if($errors->has('password'))
                    <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                {!! Form::label('Password confirmation') !!}
                {!! Form::password('password_confirmation',
                ['class' => 'form-control',  'id' => 'password_confirmation']) !!}
                @if($errors->has('password_confirmation'))
                    <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                @endif
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button class="btn btn-primary" type="submit">{{$user->exists ? 'update user' : 'add user'}}</button>
        </div>
    </div>
</div>

