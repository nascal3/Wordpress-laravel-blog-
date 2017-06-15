<table class="table table-striped">
    <thead>
    <tr>
        <th width="80">Action</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>
                @if(check_user_permissions(request(), "Blog@forceDestroy", $post->id))
                    {!! Form::open(['style' => 'display:inline-block', 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}
                    <button title="Restore" class="btn btn-xs btn-default">
                        <i class="fa fa-refresh"></i>
                    </button>
                    {!! Form::close() !!}
                    {!! Form::open(['style' => 'display:inline-block', 'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]]) !!}
                    <button title="Delete Permanent" type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                    {!! Form::close() !!}
                @endif
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->author->name}}</td>
            <td>{{$post->category->title}}</td>
            <td>
                <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>