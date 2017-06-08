<table class="table table-striped">
    <thead>
    <tr>
        <th width="80">Action</th>
        <th>Category Name</th>
        <th>Post Count</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.categories.destroy', $category->id]]) !!}
                <a href="{{route('backend.categories.edit', $category->id)}}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                @if($category->id == config('cms.default_category_id'))

                @else
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                @endif

                {!! Form::close() !!}
            </td>
            <td>{{$category->title}}</td>
            <td>{{$category->posts->count()}}</td>

        </tr>
    @endforeach
    </tbody>
</table>