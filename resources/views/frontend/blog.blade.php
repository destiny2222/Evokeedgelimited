@extends('layout.main')
@section('content')
            <!-- Start Page Title Area -->
            <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
                <div class="container">
                    <div class="page-title-content">
                        <h2 class="policy_title">Blog</h2>
                    </div>
                </div>
            </div>
            <!-- End Page Title Area -->
    
            <!-- Start Blog Area -->
            <section class="blog-area ptb-70">
                <div class="container">
                    <div class="row">
                        @forelse ($post as $posts)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-post">
                                <div class="blog-image">
                                    <a href="#">
                                        <img src="{{ asset("storage/blogger/".$posts->image) }}" alt="image">
                                    </a>
    
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i> {{  $posts->created_at->toFormattedDateString() }}
                                    </div>
                                </div>
    
                                <div class="blog-post-content">
                                    <h3><a href="#">{{   $posts->title }}</a></h3>
    
                                    <span>by <a href="#">{{  $posts->author }}</a></span>
    
                                    <p>
                                        {{ \Str::limit($posts->body,  100) }}
                                    </p>
    
                                    <a href="{{ route('post-details',$posts->slug) }}" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-lg-12">
                                <h3>No Record Found</h3>
                            </div>
                        @endforelse
                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <a href="{{ $post->previousPageUrl() }}" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
                                @for ($i = 1; $i <= $post->lastPage(); $i++)
                                    <a href="{{ $post->url($i) }}" class="page-numbers {{ $i == $post->currentPage() ? 'current' : '' }}">{{ $i }}</a>
                                @endfor
                                <a href="{{ $post->nextPageUrl() }}" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Blog Area -->
@endsection

       