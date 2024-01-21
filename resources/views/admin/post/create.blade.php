@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Create Blog</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
                </ol>
            </nav>
        </div>
    </div> <!-- Page Header Close -->
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">New Blog</div>
                </div>
                <form action="{{ route('admin.Post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="blog-title" class="form-label">Blog Title</label> 
                                <input type="text" name="title" class="form-control" id="blog-title" placeholder="Blog Title"> 
                            </div>
                            <div class="col-xl-6"> 
                                <label for="blog-author" class="form-label">Blog Author</label> 
                                <input type="text" class="form-control" name="author" id="blog-author" placeholder="Enter Name"> 
                            </div>
                            <div class="col-xl-6"> 
                                <label for="product-status-add" class="form-label">Published  Status</label> 
                                <select class="form-control"   name="publish"
                                    id="product-status-add">
                                    <option value="">Select</option>
                                    <option value="1">Published</option>
                                    <option value="0">Hold</option>
                                </select>
                            </div>
                            <div class="col-xl-12"> 
                                <label class="form-label">Blog Content</label>
                                <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-xl-12 blog-images-container">
                                <label for="blog-author-email" class="form-label">Blog Images</label>
                                <div id="yourBtn" onclick="getFile()">click to upload a file</div>
                                {{-- <input type="file" class="blog-images" name="image"> --}}
                                <div style='height: 0px;width: 0px; overflow:hidden;'>
                                    <input id="upfile" type="file" name="image" value="upload" onchange="sub(this)" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-lg btn-primary w-100">Post Blog</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::row-1 -->


</div>
@endsection
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>