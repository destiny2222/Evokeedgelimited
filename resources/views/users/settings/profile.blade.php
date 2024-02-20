@extends('layout.master')
@section('content')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<form action="{{ route('user-profile-information.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Profile</div>
                </div>
                <div class="card-body">
                    <div class="text-center chat-image ">
                        <div class="avatar avatar-xxl chat-profile mb-5 brround position-relative">
                            <a class="" href="javascript:void(0)">
                                <img alt="avatar" id="image-preview" src="{{ asset('profile/'.$user->image) }}" class="brround">
                            </a>
                            {{-- <div class=""> --}}
                                <label for="file-input" class="btn btn-primary btn-profile position-absolute top-0 end-50">Edit</label>
                                <input hidden type="file" name="image" id="file-input" >
                            {{-- </div> --}}
                        </div>
                        <div class="main-chat-msg-name pt-5">
                            <a href="javascript:void(0)">
                                <h5 class="mb-1 text-dark fw-semibold">{{ $user->name }}</h5>
                            </a>
                            <p class="text-muted mt-0 mb-0 pt-0 fs-13">Membership.No: {{ Auth::user()->referrence_id }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary" >Update</button>
                </div>
            </div>
            <div class="card panel-theme">
                <div class="card-header">
                    <div class="float-start">
                        <h3 class="card-title">Contact</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body no-padding">
                    <ul class="list-group no-margin">
                        <li class="list-group-item d-flex ps-3">
                            <div class="social social-profile-buttons me-2">
                                <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-mail"></i></a>
                            </div>
                            <a href="javascript:void(0)" class="my-auto">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item d-flex ps-3">
                            <div class="social social-profile-buttons me-2">
                                <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-globe"></i></a>
                            </div>
                            <a href="javascript:void(0)" class="my-auto">{{ $user->country }}</a>
                        </li>
                        <li class="list-group-item d-flex ps-3">
                            <div class="social social-profile-buttons me-2">
                                <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-phone"></i></a>
                            </div>
                            <a href="javascript:void(0)" class="my-auto">{{ $user->phone }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
            
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="exampleInputname">First Name</label>
                                    <input type="text" class="form-control" name="name" readonly value="{{ $user->name }}" id="exampleInputname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="exampleInputname">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" readonly value="{{ $user->last_name }}" id="exampleInputname" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="city" readonly value="{{ $user->city }}">
                        <input type="hidden" name="state" readonly value="{{ $user->state }}">
                        <input type="hidden" name="referrence_id" readonly value="{{ $user->referrence_id  }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" readonly name="email" value="{{ $user->email }}" id="exampleInputEmail1" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Home address</label>
                            <input type="email" class="form-control" readonly name="address" value="{{ $user->address  }}" id="exampleInputEmail1" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputnumber">Contact Number</label>
                            <input type="text" class="form-control" readonly name="phone" id="exampleInputnumber" value="{{ $user->phone }}">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputnumber">Country</label>
                            <input type="text" class="form-control" readonly  name="country" id="exampleInputnumber" value="{{ $user->country }}" placeholder="Contact number">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary" >Update</button>
                        {{-- <a href="javascript:void(0)" class="btn btn-danger my-1">Cancel</a> --}}
                    </div>
                
            </div>
            
        </div>
    </div>
<!-- ROW-1 CLOSED -->
</form>

@push('scripts')
<script>
    var input = document.querySelector("#file-input");
    var imagePreview = document.querySelector("#image-preview");

    input.addEventListener("change", function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Additional code for international phone input (if needed)
    var phoneInput = document.querySelector("#phone");
    var iti = window.intlTelInput(phoneInput, {
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
@endpush
@endsection    

