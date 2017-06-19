<table class="table table-striped">
    <thead>
    <tr>
        <th width="80">Action</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>

                <a href="{{route('backend.users.edit', $user->id)}}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                @if($user->id == config('cms.default_user_id'))

                @else
                    <a href="{{route('backend.users.confirm', $user->id)}}" type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                @endif

            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->roles->first()->display_name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>