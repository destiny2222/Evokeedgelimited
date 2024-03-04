@extends('layout.master-2')
@section('content')

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">User Details</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.retention.index') }}">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        User Details
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Tuition Transactions</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="col">College name</th>
                                    <th scope="col">Type Service</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student Email </th>
                                    <th scope="col">Student ID Number</th>
                                    <th scope="col">Portal Link</th>
                                    <th scope="col">Portal Password</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuition as $key => $tuitions)
                                @if (optional($tuitions->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $tuitions['college_name'] }}</td>
                                    <td>{{ $tuitions['service_type'] }}</td>
                                    <td>{{ $tuitions['legal_name'] }}</td>
                                    <td>{{ $tuitions['student_email'] }}</td>
                                    <td>{{ $tuitions['student_id'] }}</td>
                                    <td>{{ $tuitions['portal_link'] }}</td>
                                    <td>
                                        {{ $tuitions['portal_password'] }}
                                    </td>
                                    <td>
                                        {{ number_format( $tuitions['amount'] ) }}
                                    </td>
                                    <td>
                                        @if ($tuitions['paid'] == '1')
                                        <span class="badge bg-success-transparent">paid</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($tuitions['done'] == 'completed')
                                        <span class="badge bg-outline-primary">Completed</span>
                                        @elseif($tuitions['done'] == 'processing')
                                        <span class="badge bg-outline-success">Processing</span>
                                        @elseif($tuitions['done'] == 'declined')
                                        <span class="badge bg-outline-success">Declined</span>
                                        @else
                                        <span class="badge bg-outline-secondary">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $tuitions->created_at->format('m-d-y h:s A') }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Tuition via Transfer Transactions</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="col">College name</th>
                                    <th scope="col">Type Service</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student Email </th>
                                    <th scope="col">Student ID Number</th>
                                    <th scope="col">School Acount Number</th>
                                    <th scope="col">School Routing Number</th>
                                    <th scope="col">School Bank Swift Code</th>
                                    <th scope="col">School Address</th>
                                    <th scope="col">School IBAN (Optional)</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuitionwire as $key => $tuitions)
                                @if (optional($tuitions->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $tuitions->college_name }}</td>
                                    <td>{{ $tuitions->service_type }}</td>
                                    <td>{{ $tuitions->legal_name }}</td>
                                    <td>{{ $tuitions->student_email }}</td>
                                    <td>{{ $tuitions->student_id }}</td>
                                    <td>{{ $tuitions->account_number }}</td>
                                    <td>{{ $tuitions->routing_number }}</td>
                                    <td>{{ $tuitions->bank_swift_code }}</td>
                                    <td>{{ $tuitions->school_address }}</td>
                                    <td>{{ $tuitions->school_iban }}</td>
                                    <td>{{ number_format($tuitions->amount) }}</td>
                                    <td>
                                        @if ($tuitions->paid == '1')
                                        <span class="badge bg-success-transparent">paid</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($tuitions->done == 'completed')
                                        <span class="badge bg-outline-primary">Completed</span>
                                        @elseif($tuitions->done == 'processing')
                                        <span class="badge bg-outline-success">Processing</span>
                                        @elseif($tuitions->done == 'declined')
                                        <span class="badge bg-outline-success">Declined</span>
                                        @else
                                        <span class="badge bg-outline-secondary">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $tuitions->created_at->format('m-d-y h:s A') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Flight Transactions(Local Flight)</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Flying From</th>
                                    <th scope="col">Airport Location TO</th>
                                    <th scope="col">Departure Date</th>
                                    <th scope="col">Travel Class</th>
                                    <th scope="col">Adult </th>
                                    <th scope="col">Children</th>
                                    <th scope="col">Infant</th>
                                    <th scope="col">On way</th>
                                    <th scope="col">Round Trip</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($localflight as $key => $localflights)
                                @if (optional($localflights->user)->retention == '1')
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $localflights->user->name }}</th>
                                    <td>{{ $localflights['airport_location_from'] }}</td>
                                    <td>{{ $localflights['airport_location_to'] }}</td>
                                    <td>{{ $localflights['flight_date'] }}</td>
                                    <td>{{ $localflights['flight_class'] }}</td>
                                    <td>
                                        @if ($localflights['adult'] == null)
                                        no specify
                                        @else
                                        {{ $localflights['adult'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($localflights['child'] == null)
                                        no specify
                                        @else
                                        {{ $localflights['child'] }}</td>
                                    @endif
                                    <td>
                                        @if ($localflights['infant'] == null)
                                        no specify
                                        @else
                                        {{ $localflights['infant'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($localflights['on_way'] == null)
                                        no specify
                                        @else
                                        {{ $localflights['on_way'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($localflights['round_trip'] == null)
                                        no specify
                                        @else
                                        {{ $localflights['round_trip'] }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $localflights['gender'] }}
                                    </td>
                                    <th>{{ $localflights['title'] }}</th>
                                    <th>{{ $localflights['date_birth_date'] }}</th>
                                    <th>{{ $localflights['first_name'] }}</th>
                                    <th>{{ $localflights['last_name'] }}</th>
                                    <th>{{ $localflights['nationality'] }}</th>
                                    <th>{{ $localflights['phone'] }}</th>
                                    <th>{{ $localflights['email'] }}</th>
                                    <th>{{ $localflights->created_at->format('m-d-y h:s A') }}</th>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Flight Transactions(International Flight)</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="">User Name</th>
                                    <th scope="col">International Flight From</th>
                                    <th scope="col">International Flight Departure</th>
                                    <th scope="col">Return</th>
                                    <th scope="col">On Way</th>
                                    <th scope="col">Date of Departure</th>
                                    <th scope="col">Number of Passengers</th>
                                    <th scope="col">Travel Class</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">First Name On Passport</th>
                                    <th scope="col">Last Name On Passport</th>
                                    <th scope="col">Gender On Passport</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internationalflight as $key => $internationalflights)
                                @if (optional($internationalflights->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $internationalflights->user->name }}</th>
                                    <td>{{ $internationalflights['airport_location_from'] }}</td>
                                    <td>{{ $internationalflights['airport_location_to'] }}</td>
                                    <td>
                                        @if ($internationalflights['flight_return_date'] == null)
                                        Not specify
                                        @else
                                        {{ $internationalflights['flight_return_date'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($internationalflights['round_trip'] == null)
                                        Not specify
                                        @else
                                        {{ $internationalflights['round_trip'] }}
                                        @endif
                                    </td>
                                    <td>{{ $internationalflights['flight_date'] }}</td>
                                    <td>{{ $internationalflights['number_passenger'] }}</td>
                                    <td>{{ $internationalflights['flight_class'] }}</td>
                                    <td>
                                        {{ $internationalflights['passenger_title'] }}
                                    </td>
                                    <td>
                                        {{ $internationalflights['passenger_fname_onpassport'] }}
                                    </td>
                                    <td>
                                        {{ $internationalflights['passenger_lastname_onpassport'] }}
                                    </td>
                                    <td>
                                        {{ $internationalflights['passenger_gender_onpassport'] }}
                                    </td>
                                    <td>
                                        {{ $internationalflights['date_of_birth'] }}
                                    </td>
                                    <th>{{ $internationalflights['passenger_email'] }}</th>
                                    <th>{{ $internationalflights['passenger_phone'] }}</th>
                                    <th>{{ $internationalflights->created_at->format('m-d-y h:s A') }}</th>
                                    {{-- <td>
                                        <form
                                            action="{{   route('admin.international-delete', $internationalflights->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Merchandise Transactions</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="">User Name</th>
                                    <th scope="">Describtion</th>
                                    <th scope="">Currency</th>
                                    <th scope="">Seller Name</th>
                                    <th scope="">Email Supplier</th>
                                    <th scope="">Bank Amount Name</th>
                                    <th scope="">Bank Account Number</th>
                                    <th scope="">Bank Swift Code</th>
                                    <th scope="">Bank Route Number</th>
                                    <th scope="">Bank Reference Number</th>
                                    <th scope="">Recipient</th>
                                    <th scope="">Country</th>
                                    <th scope="">City</th>
                                    <th scope="">Payment Method</th>
                                    <th scope="">Postcode</th>
                                    <th scope="">Total Amount</th>
                                    <th scope="">Amount</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merchandise as $key => $merchandiser)
                                @if(optional($merchandiser->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $merchandiser->user->name }}</th>
                                    <td>{{ $merchandiser['description'] }}</td>
                                    <td>{{ $merchandiser['currency'] }}</td>
                                    <td>{{ $merchandiser['seller_name'] }}</td>
                                    <td>{{ $merchandiser['email_supplier'] }}</td>
                                    <td>{{ $merchandiser['bank_amount_name'] }}</td>
                                    <td>{{ $merchandiser['bank_account_number'] }}</td>
                                    <td>{{ $merchandiser['bank_swift_code'] }}</td>
                                    <td>
                                        {{ $merchandiser['bank_route_number'] }}
                                    </td>
                                    <td>
                                        {{ $merchandiser['bank_reference_number'] }}
                                    </td>
                                    <td>{{ $merchandiser['recipient'] }}</td>
                                    <td>{{ $merchandiser['country'] }}</td>
                                    <td>{{ $merchandiser['city'] }}</td>
                                    <td>{{ $merchandiser['payment_method'] }}</td>
                                    <td>{{ $merchandiser['postcode'] }}</td>
                                    <td>
                                        {{ number_format($merchandiser['total_amount']) }}
                                    </td>
                                    <td>
                                        {{ number_format( $merchandiser['amount'] ) }}
                                    </td>
                                    <td>
                                        @if ($merchandiser['paid'] == '1')
                                        <span class="badge bg-success-transparent">paid</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($merchandiser['done'] == 'completed')
                                        <span class="badge bg-outline-primary">Completed</span>
                                        @elseif($merchandiser['done'] == 'processing')
                                        <span class="badge bg-outline-success">Processing</span>
                                        @elseif($merchandiser['done'] == 'declined')
                                        <span class="badge bg-outline-success">Declined</span>
                                        @else
                                        <span class="badge bg-outline-secondary">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $merchandiser->created_at->format('m-d-y h:s A') }}
                                    </td>
                                    {{-- <td> --}}
                                        {{-- <div class="d-flex">
                                            <button type="submit" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $merchandiser->id }}"
                                                class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line"></i>
                                                Edit
                                            </button> --}}
                                            {{-- <form
                                                action="{{   route('admin.merchandise-delete', $merchandiser->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                    <i
                                                        class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                </button>
                                            </form> --}}

                                            {{--
                                        </div>
                                    </td> --}}
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Otherservice Transactions</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example6" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th scope="">Reasons for sending funds?</th>
                                    <th scope="">Beneficiary Name</th>
                                    <th scope="">Full Name of account holder</th>
                                    <th scope="">IBAN/Account number</th>
                                    <th scope="">SWIFT/BIC code</th>
                                    <th scope="">Routine Number (US & CAD only)</th>
                                    <th scope="">Reference</th>
                                    <th scope="">Payment Method</th>
                                    <th scope="">Total Amount</th>
                                    <th scope="">Amount</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($otherservice as $key => $otherservices)
                                @if (optional($otherservices->user)->retention == '1')
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $otherservices->user->name }}</th>
                                    <td>{{ $otherservices['funds'] }}</td>
                                    <td>{{ $otherservices['beneficiary'] }}</td>
                                    <td>{{ $otherservices['holder'] }}</td>
                                    <td>{{ $otherservices['account_number'] }}</td>
                                    <td>{{ $otherservices['swift_code'] }}</td>
                                    <td>{{ $otherservices['route_number'] }}</td>
                                    <td>{{ $otherservices['reference_number'] }}</td>
                                    <td>{{ $otherservices['payment_method'] }}</td>
                                    <td>
                                        {{ number_format($otherservices['total_amount']) }}
                                    </td>
                                    <td>
                                        {{ number_format( $otherservices['amount'] ) }}
                                    </td>
                                    <td>
                                        @if ($otherservices['paid'] == '1')
                                        <span class="badge bg-success-transparent">paid</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($otherservices['done'] == '3')
                                        <span class="badge bg-success-transparent">Completed</span>
                                        @elseif($otherservices['done'] == '2')
                                        <span class="badge bg-info-transparent">Processing</span>
                                        @elseif($otherservices['done'] == '1')
                                        <span class="badge bg-warning-transparent">Declined</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $otherservices->created_at->format('m-d-y h:s A') }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Visa Transactions(USA)</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="col">Name of Application</th>
                                    <th scope="col">Case Number</th>
                                    <th scope="col">Invoice ID</th>
                                    <th scope="col">Visa Fee Amount</th>
                                    <th scope="col">Total charge</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visaapplication as $visaapplications)
                                @if (optional($visaapplications->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $visaapplications['name'] }}</td>
                                    <td>{{ $visaapplications['case_number'] }}</td>
                                    <td>{{ $visaapplications['invoice_id'] }}</td>
                                    <td>{{ number_format($visaapplications['visa_fee_amount']) }}</td>
                                    <td>
                                        {{ number_format( $visaapplications['total_charge'] ) }}
                                    </td>
                                    <td>
                                        @if ($visaapplications['paid'] == '1')
                                        <span class="badge bg-success-transparent">paid</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($visaapplications['done'] == 'completed')
                                        <span class="badge bg-success-transparent">Completed</span>
                                        @elseif($visaapplications['done'] == 'processing')
                                        <span class="badge bg-warning-transparent">Processing</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $visaapplications->created_at->format('m-d-y h:s A') }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Visa Transactions(CANADA)</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example8" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="col">Name of Application</th>
                                    <th scope="col">Visa website link</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">User Password</th>
                                    <th scope="col">Visa Fee Amount</th>
                                    <th scope="col">Total charge</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visaapplication as $visaapplications)
                                @if (optional($visaapplications->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $visaapplications['name'] }}</td>
                                    <td>{{ $visaapplications['visa_website_link'] }}</td>
                                    <td>{{ $visaapplications['username'] }}</td>
                                    <td>{{ $visaapplications['user_password'] }}</td>
                                    <td>{{ number_format($visaapplications['visa_fee_amount']) }}</td>
                                    <td>
                                        {{ number_format( $visaapplications['total_charge'] ) }}
                                    </td>
                                    <td>
                                        @if ($visaapplications['paid'] == '1')
                                        <span class="badge bg-success-transparent">paid</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($visaapplications['done'] == 'completed')
                                        <span class="badge bg-success-transparent">Completed</span>
                                        @elseif($visaapplications['done'] == 'processing')
                                        <span class="badge bg-warning-transparent">Processing</span>
                                        @else
                                        <span class="badge bg-danger-transparent">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $visaapplications->created_at->format('m-d-y h:s A') }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Coporate Transactions</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example9" class="table text-nowrap init table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th scope="">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Bank Address</th>
                                    <th scope="col">Bank Account Number</th>
                                    <th scope="col">Bank Swift Code</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Total Amount</th>
                                    <th>Time </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($corporate as $key => $corporates)
                                @if (optional($corporates->user)->retention == 1)
                                <tr scope="row">
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $corporates->user->name }}</th>
                                    <td>{{ $corporates['name'] }}</td>
                                    <td>{{ $corporates['bank_name'] }}</td>
                                    <td>{{ $corporates['bank_address'] }}</td>
                                    <td>{{ $corporates['bank_account_number'] }}</td>
                                    <td>{{ $corporates['bank_swift_code'] }}</td>
                                    <td>{{ number_format( $corporates['amount'], 2 ) }}</td>
                                    <td>{{ number_format( $corporates['total_amount'], 2 ) }}</td>
                                    <td>{{ $corporates->created_at->format('m-d-y h:s A') }}</td>
                                    {{-- <td>
                                        <div class="d-flex gap-2">
                                            <button type="submit" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $corporates->id }}"
                                                class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line"></i>
                                                Edit
                                            </button>
                                            <form
                                                action="{{   route('admin.corporate-service-delete', $corporates->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                    <i
                                                        class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-1 -->
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('table.init').DataTable();
        $('#example').DataTable().destroy();
        $('#example2').DataTable().destroy();
        $('#example3').DataTable().destroy();
        $('#example4').DataTable().destroy();
        $('#example5').DataTable().destroy();
        $('#example6').DataTable().destroy();
        $('#example7').DataTable().destroy();
        $('#example8').DataTable().destroy();
        $('#example9').DataTable().destroy();
        // $('#example').DataTable().destroy();
    });


    $(document).ready(function() {
        $('table.init').each(function() {
            $(this).DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print all'
                    },
                    {
                        extend: 'print',
                        text: 'Print current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }
                ],
                select: true
            });
        });
    });


    


</script>
@endpush
@endsection