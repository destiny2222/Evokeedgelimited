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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Manage your notifications settings</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('announcement.settings') }}" id="form-submit" method="post">
                            @csrf
                            <input type="text" name="user_id" hidden value="{{ auth()->user()->id }}">
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="announcement" {{ $announcementSettings->announcement ?  'checked' : '' }}  class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">News Announcements</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="platform_update" {{ $announcementSettings->platform_update ?  'checked' : '' }} class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Platform Update</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="email_notification" {{ $announcementSettings->email_notification ?  'checked' : '' }} class="custom-switch-input" >
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Email Notification</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Close Your Account</div>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ipsum cumque molestias!</p>
                        <form action="{{ route('deactivate.account') }}" method="post">
                            @csrf
                            <div class="wrap-input100 validate-input input-group mb-4" id="Password-toggle1">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input type="password" class="form-control" name="current_password" id="passwordInput" placeholder="Enter your password" required type="password"  style="max-width: 265px;">
                            </div>
                            <div>
                                <button type="submit"  class="btn btn-danger my-1">Close Your Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

@push('script')
   <script type="text/javascript">
        var setting = document.querySelectorAll('input[type="checkbox"]');
        setting.forEach(settings => {
            settings.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('form-submit').submit();
            });
        });
   </script>
@endpush