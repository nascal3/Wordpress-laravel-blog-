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
                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
                @if(check_user_permissions(request(), "Blog@edit", $post->id))
                    <a href="{{route('backend.blog.edit', $post->id)}}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                @endif
                {!! Form::close() !!}
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->author->name}}</td>
            <td>{{$post->category->title}}</td>
            <td>
                <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
                {!! $post->publicationLabel() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>