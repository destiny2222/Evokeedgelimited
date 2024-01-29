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



<div class="col-md-12 col-xl-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Vertical Form</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" autocomplete="username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Basic</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one">
                                <option label="Choose one">
                                </option>
                                <option value="1">Chuck Testa</option>
                                <option value="2">Sage Cattabriga-Alosa</option>
                                <option value="3">Nikola Tesla</option>
                                <option value="4">Cattabriga-Alosa</option>
                                <option value="5">Nikola Alosa</option>
                            </select>
                    </div>
                    <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
                            <span class="custom-control-label">Check me Out</span>
                        </label>
                </div>
                <button class="btn btn-primary mt-4 mb-0">Submit</button>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
       const Payvia = document.querySelector('#payvia');
        const Portal = document.querySelector('#portal');

        Payvia.addEventListener('click', function(e) {
            e.preventDefault();
            if (Portal.style.display === 'none' || Portal.style.display === '') {
                Portal.style.display = 'block';
            } else {
                Portal.style.display = 'none';
            }
        });
    </script>
    <script>
        const Wire = document.querySelector('#wiretransfer');
         const wire = document.querySelector('#wire');
 
         Wire.addEventListener('click', function(e) {
             e.preventDefault();
             if (wire.style.display === 'none' || wire.style.display === '') {
                 wire.style.display = 'block';
             } else {
                 wire.style.display = 'none';
             }
         });
     </script>
@endpush


<div class="col-md-12 col-xl-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Vertical Form</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" autocomplete="username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Basic</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one">
                                <option label="Choose one">
                                </option>
                                <option value="1">Chuck Testa</option>
                                <option value="2">Sage Cattabriga-Alosa</option>
                                <option value="3">Nikola Tesla</option>
                                <option value="4">Cattabriga-Alosa</option>
                                <option value="5">Nikola Alosa</option>
                            </select>
                    </div>
                    <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
                            <span class="custom-control-label">Check me Out</span>
                        </label>
                </div>
                <button class="btn btn-primary mt-4 mb-0">Submit</button>
            </form>
        </div>
    </div>
</div>


<div class="container" style="padding-top: 20px">
    <div class="container-item shadow-lg p-r-3 p-l-3 p-b-3 p-t-3">
        <form action="{{  route('tuition-pay') }}" method="post">
            @csrf
            <div id='form'>
                <div class="slide-one">
                    <h2>Application Fee</h2>
                    <span class='msg' style="color: red; font-size: 13px;"></span>
                    <br>
                    <p>Amount: ${{ number_format($pay->amount, 2) }} </p>
                    <p>EvokeEdge Service fee: {{ $charges->tuition_charge_amount }}%</p>
                    <p>Total amount: <span id="total">${{ number_format($totalPay, 2)  }}</span></p>
                    <div>
                        <button type="button"  class="submit-form w-100 next">Confirm and Continue</button>
                    </div>
                </div>
                <input type="text" name="amount" value="{{ number_format($pay->amount,2) }}" hidden style="border: none" id="">
                <input type="text" name="serviceCharge" value="{{ $charges->tuition_charge_amount }}" hidden style="border:none"  id=""> 
                <input type="text" name="total" class="total-amount" id="" hidden value="{{ number_format( $totalPay,2)  }}"  style="border:none">  
                <div class="slide-two">
                    <span class='msg2' style="color: red; font-size: 13px;"></span><br>
                    <p id='back'><i class="fa fa-arrow-left"></i> <span id='name' style="color: #383838;"></span></p><br>
                    <div class="container">
                        <div class="row m-b-4">
                           <div class="col-lg-12">
                                <h3>Payment Option</h3>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="card-payment-ul">
                                    <li class="card-payment d-flex gap-3 m-b-1">
                                        <input id="payment_method_balance" type="radio" class="input-radio" name="paymentMethod" value="balance">
                                        <label class="" for="payment_method_balance">
                                             Make payment with Balance: ${{ number_format(auth()->user()->userwallet->amount,2 ) }}
                                        </label>
                                    </li>
                                    {{-- <li class="card-payment d-flex m-b-1">
                                        <input id="payment_method_local" type="radio" class="input-radio" name="paymentMethod" value="debit">
                                        <label class="" for="payment_method_local">
                                            DIRECT BANK TRANSFER
                                        </label>
                                    </li> --}}
                                    <li class="card-payment m-b-1">
                                        <input id="payment_method_paystack" type="radio" class="input-radio" name="paymentMethod" value="visa">
                                        <label class="" for="payment_method_paystack">
                                            <img width="100" src="{{ asset('visa.png') }}" alt="">
                                        </label>  
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="col-lg-12 col-12 text-center">
                                <input type="submit" value="Proceed to payment" class="submit-form  w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



