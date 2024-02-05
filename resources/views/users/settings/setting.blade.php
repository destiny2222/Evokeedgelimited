@extends('layout.master')
@section('content')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->



<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Password Change</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 form-control  @error('current_password', 'updatePassword') is-invalid  @enderror" type="password" placeholder="Current Password" name="current_password" autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                         <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 form-control  @error('password', 'updatePassword') is-invalid  @enderror" type="password" placeholder="New Password" name="password"  autocomplete="new-password">
                        @error('password', 'updatePassword')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 form-control" type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                        @error('password_confirmation', 'updatePassword')
                            <span  class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Manage your notifications settings</div>
            </div>
            <div class="card-body">
                <div class="form-group mg-b-10">
                    <label class="custom-switch ps-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                        <span class="custom-switch-indicator me-3"></span>
                        <span class="custom-switch-description mg-l-10">Updates Automatically</span>
                    </label>
                </div>
                <div class="form-group mg-b-10">
                    <label class="custom-switch ps-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                        <span class="custom-switch-indicator me-3"></span>
                        <span class="custom-switch-description mg-l-10">Allow Location Map</span>
                    </label>
                </div>
                <div class="form-group mg-b-10">
                    <label class="custom-switch ps-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                        <span class="custom-switch-indicator me-3"></span>
                        <span class="custom-switch-description mg-l-10">Show Contacts</span>
                    </label>
                </div>
                <div class="form-group mg-b-10">
                    <label class="custom-switch ps-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                        <span class="custom-switch-indicator me-3"></span>
                        <span class="custom-switch-description mg-l-10">Show Notfication</span>
                    </label>
                </div>
                <div class="form-group mg-b-10">
                    <label class="custom-switch ps-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                        <span class="custom-switch-indicator me-3"></span>
                        <span class="custom-switch-description mg-l-10">Show Tasks Statistics</span>
                    </label>
                </div>
                <div class="form-group mg-b-10">
                    <label class="custom-switch ps-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked="">
                        <span class="custom-switch-indicator me-3"></span>
                        <span class="custom-switch-description mg-l-10">Show Email Notification</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush