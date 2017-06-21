<div class="col-md-4">
    <aside class="right-sidebar">

        <div class="search-widget">
            <form action="{{route('blog')}}">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" value="{{request('term')}}" name="term" placeholder="Search for...">
                    <span class="input-group-btn">
                                <button class="btn btn-lg btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                              </span>
                </div>
            </form>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($categories as $category )
                    <li>
                        <a href="{{ route('category', $category->slug) }}"><i class="fa fa-angle-right"></i>{{$category->title}}</a>
                        <span class="badge pull-right">{{$category->posts->count()}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($popularPosts as $Post)
                    <li>
                        @if($Post->image_thumb_url)
                        <div class="post-image">
                            <a href="{{route('blog.show', $Post->slug)}}">
                                <img src="{{$Post->image_thumb_url}}" />
                            </a>
                        </div>
                        @endif
                        <div class="post-body">
                            <h6><a href="{{route('blog.show', $Post->slug)}}">{{$Post->title}}</a></h6>
                            <div class="post-meta">
                                <span>{{$Post->date}}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach($tags as $tag)
                        <li><a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </aside>
</div>