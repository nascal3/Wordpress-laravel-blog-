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

            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                {!! Form::label('Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}

                @if($errors->has('name'))
                    <span class="help-block">{{$errors->first('slug')}}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                {!! Form::label('Bio') !!}
                {!! Form::textArea('bio', null, ['class' => 'form-control', 'rows' => 5, 'id' => 'bio']) !!}

                @if($errors->has('bio'))
                    <span class="help-block">{{$errors->first('slug')}}</span>
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

            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                {!! Form::label('Role') !!}
                @if($user->exists && ($user->id == config('cms.default_user_id') || isset($hideRoleDropdown)) )
                    {!! Form::hidden('role', $user->roles->first()->id) !!}
                    <p>{{$user->roles->first()->display_name}}</p>
                @else
                    {!! Form::select('role', \App\Role::pluck('display_name', 'id'), $user->exists ? $user->roles->first()->id : null,['class' => 'form-control', 'placeholder' => 'Select role']) !!}
                    @if($errors->has('role'))
                        <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                    @endif
                @endif
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button class="btn btn-primary" type="submit">{{$user->exists ? 'update user' : 'add user'}}</button>
        </div>
    </div>
</div>

@include('backend.users.script')
