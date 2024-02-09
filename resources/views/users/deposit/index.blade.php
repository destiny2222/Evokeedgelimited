@extends('layout.master')
@section('content')
@section('page-title', 'Accounts')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

<!-- ROW OPEN -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card" id="Password-toggle">
            <div class="card-header justify-content-between">
                <h3 class="accounts-title" >
                    My Balance
                    <a href="javascript:void(0)" >
                        <i class="zmdi zmdi-eye eye" aria-hidden="true"></i>
                    </a>
                </h3>
                <div class="text-end">
                    <button type="button" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8" class="btn btn-primary add-balance">Add New Balance <i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-around gap-5 text-center">
                    <div class="position-relative">
                        <small class="text-muted fw-bold">Available Balance</small>
                        <h2 class="mb-2 pt-3 fw-bold "><span class="user-balance">{{ $userbalance->amount ? : 0  }}</span></h2>
                        <div class="d-flex asterisk" id="asterisk" >
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <small class="text-muted fw-bold">Pending Balance</small>
                        <h2 class="mb-2 pt-3 fw-bold">
                            $<span class="user-balance2">{{ $userbalance->balance ? : 0 }}</span>
                        </h2>
                        <div class="d-flex asterisk" id="asterisk" >
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                            <a href="javascript:void()" class="text-dark"><i class="fa fa-asterisk fs-6"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
</div>
<!-- ROW CLOSED -->

<!-- MODAL EFFECTS -->
<div class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add New Balance</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form class=""  method="POST"> --}}
                    <p class="sc-dkrGVk kHcUip" style="color: rgb(73, 84, 108);">Select your choice</p>
                    <div class="deposit-card mb-4">
                        <div class="">
                            <label class="pt-1">
                                <input type="checkbox"  name="paymentMethod" value="online-transfer"><span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="deposit-card-o">
                            <img src="/assets/img/local.jpg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                            <p  class="" style="color: rgb(73, 84, 108);">Local online bank</p>
                        </div>
                    </div>
                    <div class="deposit-card mb-4">
                        <div class="">
                            <label class="pt-1">
                                <input type="checkbox" name="paymentMethod"  value="bank-transfer"><span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="deposit-card-o">
                            <img src="/assets/img/transfer.jpg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                            <p  class="" style="color: rgb(73, 84, 108);">Bank wire</p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 12px;">
                        <button type="submit" class="btn btn-primary" id="submit" disabled style="height: 48px;" >Proceed to add balance</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    var checkboxes = document.querySelectorAll('input[name="paymentMethod"]');
    var submit = document.querySelector('#submit');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function(e) {
            if (checkbox.checked) {
                submit.disabled = false;
            } else {
                submit.disabled = true;
            }
        });
    });

    submit.addEventListener('click', function(e) {
        if (submit.disabled) {
            e.preventDefault(); 
        } else {
            var selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
            if (selectedPaymentMethod === 'online-transfer') {
                window.location.href = "/dashboard/add/flutter";
            } else if (selectedPaymentMethod === 'bank-transfer') {
                window.location.href = "/dashboard/add/bank";
            }
        }
    });
</script>
<script>
 (function() {
    "use strict";

        var availableBalance = document.querySelector('#Password-toggle .user-balance:nth-of-type(1)');
        var pendingBalance = document.querySelector('#Password-toggle .user-balance2');
        var asterisks = document.querySelectorAll('.asterisk a');

        document.querySelector("#Password-toggle .eye").addEventListener('click', function(event) {
            event.preventDefault();

            // Toggle visibility for available balance
            if (availableBalance.style.visibility !== "hidden") {
                availableBalance.style.visibility = 'hidden';
                asterisks.forEach(function(asterisk) {
                    asterisk.style.display = 'block';
                });
            } else {
                availableBalance.style.visibility = 'visible';
                asterisks.forEach(function(asterisk) {
                    asterisk.style.display = 'none';
                });
            }

            // Toggle visibility for pending balance
            if (pendingBalance.style.visibility !== "hidden") {
                pendingBalance.style.visibility = 'hidden';
            } else {
                pendingBalance.style.visibility = 'visible';
            }

            // Toggle eye icon class
            // this.classList.toggle("zmdi-eye-off");
            // this.classList.toggle("zmdi-eye");
        });
    })();

</script>


@endpush
@endsection
