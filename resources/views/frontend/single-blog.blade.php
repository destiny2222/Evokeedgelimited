@extends('layout.main')
@section('content')
            <!-- Start Page Title Area -->
            <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
                <div class="container">
                    <div class="page-title-content">
                        <h2>Blog Details</h2>
                    </div>
                </div>
            </div>
            <!-- End Page Title Area -->
    
            <!-- Start Blog Details Area -->
            <section class="blog-details-area ptb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="blog-details">
                                <div class="article-image">
                                    <img src="{{ asset("storage/blogger/".$post->image) }}" alt="image">
                                </div>
    
                                <div class="article-content">
                                    <div class="entry-meta">
                                        <ul>
                                            <li><span>Posted On:</span> <a href="#">{{  $post->created_at->toFormattedDateString() }}</a></li>
                                            <li><span>Posted By:</span> <a href="#">{{  $post->author }}</a></li>
                                        </ul>
                                    </div>
    
                                    @if($post)
                                    <h3>{{ $post->title }}</h3>
                                @else
                                    <p>Post not found.</p>
                                @endif
                                
    
                                    <p>
                                        {{  $post->body }}
                                    </p>
    
                                    
                                    
                                </div>
    
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-12">
                            <aside class="widget-area" id="secondary">
                                <section class="widget widget_luvion_posts_thumb">
                                    <h3 class="widget-title">Recent Posts</h3>
                                    @foreach ($recent as $recentblog)
                                        <article class="item">
                                            <a href="{{ route('post-details', $recentblog->slug) }}" class="thumb">
                                                <img src="{{ asset("storage/blogger/".$recentblog->image) }}" alt="" class="fullimage cover bg1">
                                            </a>
                                            <div class="info">
                                                <time datetime="2021-06-30">{{  $recentblog->created_at->toFormattedDateString() }}</time>
                                                <h4 class="title usmall">
                                                    <a href="{{ route('post-details', $recentblog->slug) }}">{{  $recentblog->title }}</a>
                                                </h4>
                                            </div>
                                            <div class="clear"></div>
                                        </article>
                                    @endforeach    
                                </section>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Blog Details Area -->
@endsection
        
