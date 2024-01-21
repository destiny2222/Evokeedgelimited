@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Mail</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Mail</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <form action="{{  route('admin.send-mail-store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="note">Note</label>
                                <textarea name="message" class="form-control" id="note" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg w-100" value="Send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!--End::row-1 --> 
</div>
@endsection
