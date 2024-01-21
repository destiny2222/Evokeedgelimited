<div class="container p-t-5">
    {{-- <h1 class="m-b-2 payschool-h1">Settings</h1> --}}
    <div class="account_setting">
        <div class="setting_sidebar">
            <ul class="setting_ul">
                <li class="setting_li setting_li_active">
                    <a href="#" class="setting_li_a">
                        <span class="setting_icon">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                        </span>
                        <span>Password</span>
                    </a>
                </li>
                <li class="setting_li">
                    <a href="#" class="setting_li_a">
                        <span class="setting_icon">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </span>
                        <span> Notifications settings </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="setting_content">
            <div class="password s_content setting_li_active">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="account-setting-h1">Password Settings</h2>
                        </div>
                        {{-- @if (session('status') == "password-updated")
                        <span class="alert-u alert-updated-success" role="alert">
                            Password Updated Successfully
                        </span>
                        @endif --}}
                    </div>
                    <form action="{{ route('user-password.update') }}" method="post" style="margin-top:30px;">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="current_password">Old Password</label>
                                <div class="login-password">
                                    <div class="form-group">
                                        <input type="password" id="current_password" name="current_password" @error('current_password', 'updatePassword') is-invalid  @enderror"
                                            required>
                                        @error('current_password', 'updatePassword')
                                        <span style="color:#f59198;font-weight:600;" class="invalid-feedback">{{
                                            $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="password_input"> New Password</label>
                                <div class="login-password">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password_input"
                                            class="applicant-input" placeholder="">
                                        @error('password', 'updatePassword')
                                        <span style="color:#f59198;font-weight:600;" class="invalid-feedback">{{
                                            $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="Confirm_password"> Confirm Password</label>
                                <div class="login-password">
                                    <div class="form-group">
                                        <input type="password" id="Confirm_password" name="password_confirmation"
                                            class="applicant-input" placeholder="">
                                        @error('password_confirmation', 'updatePassword')
                                        <span style="color:#f59198;font-weight:600;" class="invalid-feedback">{{
                                            $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="notification s_content">
                <div class="container">
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="col-lg-12">
                            <h2 class="account-setting-h1">Manage your notification settings</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Email</th>
                                    <th>Sms</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Platform Update</td>
                                    <td>
                                        <input type="checkbox" name="" id="myCheckbox ">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="" id="myCheckbox ">
                                    </td>
                                </tr>
                                <tr>
                                    <td>News Announcements</td>
                                    <td>
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="" id="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="select_payment_method tabs">
    <div class="local_banking tab">
        <div class="imgae_payment">
            <img src="{{ asset('assets/img/local.jpg') }}" alt="">
        </div>
        <span>Local online bank</span>
    </div>
    <div class="visa tab">
        <div class="imgae_payment">
            <img src="{{  asset('assets/img/transfer.jpg') }}" width="70" alt="">
        </div>
        <span>Bank wire</span>
    </div>

</div>
<div class="tab-content">
    <div class="deposit-detail local_banking content">
        <h4>Enter details:</h4>
        <form action="{{ route('deposit.payment') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <div class="" style="margin-bottom: 1rem;position:relative;">
                <label for="amount" style="padding-top: 20px;">Amount:</label>
                <input type="number" name="amount" id="amount" class="applicant-input">
                <div class="amount-usd">
                    <p>USD</p>
                </div>
            </div>
            <div class="" style="margin-bottom: 1rem;">
                <label for="holder_name" style="padding-top: 20px;">Account Holder Name:</label>
                <input type="text" name="name" id="holder_name" class="applicant-input">
            </div>
            <span>Enter your name as it appears in your Payment Account</span>
            <p>You cannot make a deposit using 3rd party. The name on your EvokeEdge Limited Account must match the same
                account used to make payment.</p>

            <div style="text-align:center;margin-top:50px">
                <input type="submit" value="Proceed">
            </div>
        </form>
    </div>
    <div class="visa deposit-detail content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-b-1 m-t-2">
                    <h5><b>Bank Name</b>: United Bank of Africa</h5>
                </div>
                <div class="col-lg-12 m-b-1 m-t-2">
                    <h5><b>Account Name</b>: EvokeEdge Limited</h5>
                </div>
                <div class="col-lg-12 m-b-1 m-t-2">
                    <h5><b>Account Number</b>: 3004158137</h5>
                </div>
                <div class="col-lg-12 m-b-1 m-t-2">
                    <h5><b>Swift Code</b>: UNAFNGLA</h5>
                </div>
                <div class="col-lg-12 m-b-1 m-t-2">
                    <h5><b>Bank Address</b>: 57 Marina, Lagos Island, Lagos, Nigeria.</h5>
                </div>
                <div class="col-lg-12 m-b-1 m-t-2">
                    <h5><b>Account Currency</b>: USD</h5>
                </div>
            </div>
        </div>
    </div>
</div>