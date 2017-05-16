@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    <div class="post-item-image">
                        <a href="#">
                            <img src="/img/Post_Image_1.jpg" alt="">
                        </a>
                    </div>

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> February 12, 2016</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium molestiae, eveniet dignissimos totam recusandae nesciunt architecto consequatur sit ratione, labore asperiores ipsa molestias voluptatibus! Expedita eveniet est officia impedit recusandae.</p>
                            <p>Accusamus a quod laboriosam, iusto ipsum, optio ullam ratione aspernatur molestias minima quia architecto id earum soluta ipsa veniam deserunt? Assumenda quasi non similique hic, consequuntur fugit corporis impedit? Beatae?</p>
                            <p>Veniam officiis a, odio, natus facilis recusandae voluptate et odit quasi assumenda molestiae alias culpa earum ea eius eum rerum commodi. Laudantium inventore reiciendis repellendus nisi natus voluptas, similique repellat.</p>
                            <p>Quasi iure magni sint ipsam adipisci facere hic corporis saepe nihil natus minus illum quidem dicta porro, voluptates, ea in illo itaque praesentium voluptate cumque similique. Aspernatur totam architecto nihil.</p>
                            <p>Ea nisi ipsam dolor nam quae esse accusantium non minima! Exercitationem cupiditate nisi necessitatibus excepturi voluptatum quam, totam, omnis accusamus velit sed distinctio inventore laudantium ullam maxime quas quis impedit?</p>
                            <p>Itaque fugit nemo, suscipit exercitationem. Et quas sunt excepturi quis iste earum, temporibus quae, ab! Fugit unde cum laboriosam, corporis, optio nihil quia deserunt obcaecati quod natus repellat architecto quo.</p>
                            <p>Sed tenetur quasi eius reprehenderit dolor aut optio ab, possimus iste, quia impedit dignissimos, nostrum deserunt nihil labore. Impedit quia aliquid, dolorem provident reprehenderit rem dicta minima corrupti! Omnis, libero.</p>
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="Author 1" src="/img/author.jpg" class="media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Masaru Edo</a></h4>
                            <div class="post-author-count">
                                <a href="#">
                                    <i class="fa fa-clone"></i>
                                    90 posts
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus consequuntur! Non.</p>
                        </div>
                    </div>
                </article>

                {{--comments here--}}

            </div>
            @include('layouts.sidebar')
        </div>
    </div>

@endsection