@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Canada Visa Application</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Canada Visa Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Canada Visa Application</li>
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
                                @foreach ($visaapplication  as $visaapplications)
                                    @if (optional($visaapplications->user)->retention != 1)
                                        <tr scope="row">
                                            <th>{{  $loop->index + 1 }}</th>
                                            <td>{{  $visaapplications['name'] }}</td>
                                            <td>{{  $visaapplications['visa_website_link'] }}</td>
                                            <td>{{  $visaapplications['username'] }}</td>
                                            <td>{{  $visaapplications['user_password'] }}</td>
                                            <td>{{  number_format($visaapplications['visa_fee_amount']) }}</td>
                                            <td>
                                                {{  number_format( $visaapplications['total_charge'] ) }}
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
                                                {{  $visaapplications->created_at->format('m-d-y h:s A') }}
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $visaapplications->id }}" class="btn btn-sm btn-info btn-wave">
                                                        <i class="ri-edit-line"></i>
                                                        Edit
                                                    </button>
                                                    <form action="{{   route('admin.visa-application-delete', $visaapplications->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                            <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.visaapplication.edit')
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>
                            Showing {{ $visaapplication->firstItem() }} to {{ $visaapplication->lastItem() }} of {{ $visaapplication->total() }} Entries
                            @if($visaapplication->hasMorePages())
                                <a href="{{ $visaapplication->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($visaapplication->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $visaapplication->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($visaapplication->getUrlRange(1, $visaapplication->lastPage()) as $page => $url)
                                        <li class="page-item {{ $visaapplication->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($visaapplication->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $visaapplication->nextPageUrl() }}">Next</a>
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

</div>
@endsection
