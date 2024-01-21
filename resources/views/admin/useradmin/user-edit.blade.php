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
            <form action="{{ route('admin.update-user-page', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                    
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('Country') }}</label>
                        <input type="text" value="{{ $user->country }}" name="country" class="form-control @error('country') is-invalid @enderror" id="basic-default-fullname"/>
                        @error('country')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    {{-- <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('State') }}</label>
                        <input type="text" value="{{ $user->state }}" name="state" class="form-control @error('state') is-invalid @enderror" id="basic-default-fullname"/>
                        @error('state')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('City') }}</label>
                        <input type="text" value="{{ $user->city }}" name="city" class="form-control @error('city') is-invalid @enderror" id="basic-default-fullname"/>
                        @error('city')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div> --}}
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
@endsection

{{-- @include('layouts.script') --}}
