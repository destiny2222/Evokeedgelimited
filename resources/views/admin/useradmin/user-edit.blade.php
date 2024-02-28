@extends('layout.master-2')
@section('content')

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Users</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Users
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="row">
        <div class="card shadow p-3">
           <div class="card-body">
            <form action="{{ route('admin.update-user-page', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- <input type="text" value="{{ $user->is_banned }}" name="is_banned" hidden>
                <input type="text" value="{{ $user->retention }}" name="retention" hidden> --}}
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('Name') }}</label>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="First name" />
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('Email') }}</label>
                        <input type="text" name="email" value="{{ $user->email }}"
                            class="form-control @error('email') is-invalid @enderror" id="basic-default-fullname"
                            placeholder="Email  address" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('Phone Number') }}</label>
                        <input type="text" name="phone" value="{{ $user->phone }}"
                            class="form-control @error('phone') is-invalid @enderror" id="basic-default-fullname"
                            placeholder="Phone Number" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">{{ __('Total balance') }}</label>
                        <input type="number" value="{{ $useramount }}" name="userwallet_amount" class="form-control @error('userwallet_amount') is-invalid @enderror"  />
                        @error('userwallet_amount')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('Address') }}</label>
                        <input type="text" value="{{ $user->address }}" name="address" class="form-control @error('address') is-invalid @enderror" id="basic-default-fullname" />
                        @error('address')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    
                    <div class="col-12 mb-4">
                        <label class="form-label" for="basic-default-fullname">{{ __('Country') }}</label>
                        <input type="text" value="{{ $user->country }}" name="country" class="form-control @error('country') is-invalid @enderror" id="basic-default-fullname"/>
                        @error('country')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" hidden class="form-label">Upload Popfile Image</label>
                        <input class="form-control" hidden value="{{ $user->image }}" name="image" type="file" id="formFile" />
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
    
                </div>
                <div class="row g-2">
                    <div class="col mb-0 text-center">
                        <input type="submit" class="btn btn-primary btn-lg" value="Save Change">
                    </div>
                </div>
            </form>
           </div>
        </div>
    </div>
    <script>
        /* toggle switches */
        let customSwitch = document.querySelectorAll('.toggle');
        customSwitch.forEach(e => e.addEventListener('click', () => {
            e.classList.toggle("on");
        }));
        /* toggle switches */
    </script>
@endsection
