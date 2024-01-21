@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Blog</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xxl-12 col-xl-12">
            <div class="row">
                @forelse ($post as $posts)
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card custom-card"> 
                        <a href="{{ route('admin.blog-details', $posts->slug) }}"> 
                            <img src="{{ asset("storage/blogger/".$posts->image) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body"> <a href="blog-details.html"
                                class="fw-semibold fs-14 text-dark mb-1">{{ $posts->title }}</a>
                            <p class="card-text text-muted mb-3">
                                {{ $posts->body }}
                            </p>
                            <a href="{{ route('admin.blog-details', $posts->slug) }}" class="btn btn-primary-light">Read More</a>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $posts->author }}</p>
                                        <p class="text-muted fs-10 mb-0">{{ $posts->created_at->toFormattedDateString() }}</p>
                                    </div>
                                </div>
                                <div class="btn-list"> 
                                    <button  type="button" data-bs-toggle="modal"
                                      data-bs-target="#modalTop{{ $posts->id }}" class="btn btn-icon btn-light btn-sm">
                                        <i class="ri-edit-line"></i>
                                    </button> 
                                    <form action="{{  route('admin.Post.destroy', $posts->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button  type="submit" class="btn btn-icon btn-light btn-sm">
                                            <i class="ri-delete-bin-2-fill"></i>
                                        </button> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.post.edit')
                @empty
                    No Record Found
                @endforelse
                </div>
        </div>
    </div> <!--End::row-1 --> <!-- Start: pagination -->
    <div class="float-end mb-4">
        <nav aria-label="Page navigation" class="">
            <ul class="pagination mb-0">
                <li class="page-item disabled"> <a class="page-link" href="javascript:void(0);"> Prev </a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                <li class="page-item"> <a class="page-link" href="javascript:void(0);"> <i
                            class="bi bi-three-dots"></i> </a> </li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">17</a></li>
                <li class="page-item"> <a class="page-link text-primary" href="javascript:void(0);"> next
                    </a> </li>
            </ul>
        </nav>
    </div> <!-- End: pagination -->
</div>
@endsection
