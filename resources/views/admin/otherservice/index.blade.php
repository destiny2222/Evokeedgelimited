@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">OtherService</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">OtherService</a></li>
                    <li class="breadcrumb-item active" aria-current="page">OtherService</li>
                </ol>
            </nav>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($otherservice as $key => $otherservices)
                                <tr scope="row">
                                    <th>{{  $key + 1 }}</th>
                                    <th>{{  $otherservices->user->name }}</th>
                                    <td>{{  $otherservices['funds'] }}</td>
                                    <td>{{  $otherservices['beneficiary'] }}</td>
                                    <td>{{  $otherservices['holder'] }}</td>
                                    <td>{{  $otherservices['account_number'] }}</td>
                                    <td>{{  $otherservices['swift_code'] }}</td>
                                    <td>{{  $otherservices['route_number'] }}</td>
                                    <td>{{  $otherservices['reference_number'] }}</td>
                                    <td>{{  $otherservices['payment_method']  }}</td>
                                    <td>
                                        {{  number_format($otherservices['total_amount'])  }}
                                    </td>
                                    <td>
                                        {{  number_format( $otherservices['amount'] ) }}
                                    </td>
                                    <td>
                                        @if ($otherservices['paid'] == '1') 
                                          <span class="badge bg-success-transparent">paid</span>
                                        @else
                                          <span class="badge bg-danger-transparent">Not paid </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($otherservices['done'] == '2')
                                           <span class="badge bg-success-transparent">Completed</span>
                                        @elseif($otherservices['done'] == '1')
                                           <span class="badge bg-warning-transparent">Processing</span>   
                                        @else
                                          <span class="badge bg-danger-transparent">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $otherservices->created_at->format('m-d-y h:s A')  }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $otherservices->id }}" class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line"></i>
                                                Edit
                                            </button>
                                            {{-- <form action="{{   route('admin.merchandise-delete', $otherservices->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                    <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.otherservice.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>
                            Showing {{ $otherservice->firstItem() }} to {{ $otherservice->lastItem() }} of {{ $otherservice->total() }} Entries
                            @if($otherservice->hasMorePages())
                                <a href="{{ $otherservice->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($otherservice->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $otherservice->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($otherservice->getUrlRange(1, $otherservice->lastPage()) as $page => $url)
                                        <li class="page-item {{ $otherservice->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($otherservice->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $otherservice->nextPageUrl() }}">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Next
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--End::row-1 --> 

    <div class="row">

    </div>
</div>
@endsection
