@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Charges</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Charges</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Charges</li>
                </ol>
            </nav>
        </div>
    </div>
<!-- Button trigger modal -->



    <div class="row">
        <div class="text-end mb-3">
            <a href="javascript:void()" data-bs-toggle="modal"
            data-bs-target="#modalTop" class="btn  btn-primary btn-wave">
                Add/Change Charge
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xxl-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="col">Tuition Charge Amount</th>
                                    <th scope="col">Visa Charge Amount</th>
                                    <th scope="col">Corporate Charge Amount</th>
                                    <th scope="col">Merchant Charge Amount</th>
                                    <th scope="col">Flights Charge Amount</th>
                                    <th scope="col">OtherService Amount</th>
                                    <th scope="col">BDC Charge Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($charge as $key => $charges)
                                <tr scope="row">
                                    <th>{{  $key + 1 }}</th>
                                    <td>{{  $charges['tuition_charge_amount']  }}</td>
                                    <td>{{  $charges['visa_charge_amount'] }}</td>
                                    <td>{{  $charges['corporate_charge_amount']   }}</td>
                                    <td>{{  $charges['merchant_charge_amount']   }}</td>
                                    <td>{{  $charges['flights_charge_amount']  }}</td>
                                    <td>{{  $charges['other_service']  }}</td>
                                    <td>{{  $charges['bdc_charge']  }}</td>
                                        
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                        {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $charges->id }}">
                                            <i class="ri-edit-line align-middle  d-inline-block"></i>
                                            Edit
                                          </button> --}}
                                        <form action="{{ route('admin.transaction-charge-delete', $charges->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                            </button>
                                        </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--End::row-1 --> 
</div>


@include('admin.Charges.create')
@endsection
