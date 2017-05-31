@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@elseif(session('trash-message'))
    <div class="alert alert-success">
        <?php list($message, $postId) = session('trash-message') ?>
        {!! Form::open(['method'=> 'PUT', 'route' => ['backend.blog.restore', $postId]]) !!}
            {{$message}}
            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Undo</button>
        {!! Form::close() !!}
    </div>
@endif