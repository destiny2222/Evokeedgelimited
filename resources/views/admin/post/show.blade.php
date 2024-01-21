@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Blog Details</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Blog Details</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <p class="fs-18 fw-semibold mb-1">
                        {{ $post->title }}
                    </p>
                    <div class="d-sm-flex align-items-cneter">
                        <div class="d-flex align-items-center flex-fill">
                            <div>
                                <p class="mb-0 fw-semibold">{{ $post->author }} - <span
                                        class="fs-11 text-muted fw-normal">{{ $post->created_at->toFormattedDateString() }}</span>
                                </p>
                                <p class="mb-0 text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div> 
                <a href="javascript:void(0);"> 
                    <img src="{{ asset("storage/blogger/".$post->image) }}" class="card-img rounded-0 blog-details-img" alt="..."> 
                </a>
                
                <div class="card-body">
                    <h6 class="fw-semibold"> 
                        {{ $post->title }}
                    </h6>
                    <p class="mb-4 text-muted"> 
                        {{ $post->body }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection