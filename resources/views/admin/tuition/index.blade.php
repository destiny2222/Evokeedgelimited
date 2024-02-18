@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Tuition Payment</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Tuition Payment</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tuition Payment</li>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($tuition as $key => $tuitions)
                                <tr scope="row">
                                    <th>{{  $key + 1 }}</th>
                                    <td>{{  $tuitions['college_name'] }}</td>
                                    <td>{{  $tuitions['service_type'] }}</td>
                                    <td>{{  $tuitions['legal_name'] }}</td>
                                    <td>{{  $tuitions['student_email'] }}</td>
                                    <td>{{  $tuitions['student_id'] }}</td>
                                    <td>{{  $tuitions['portal_link'] }}</td>
                                    <td>
                                        {{  $tuitions['portal_password']  }}
                                    </td>
                                    <td>
                                        {{  number_format( $tuitions['amount'] ) }}
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
                                        {{  $tuitions->created_at->format('m-d-y h:s A') }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $tuitions->id }}" class="btn btn-sm btn-info btn-wave">
                                                <i class="ri-edit-line"></i>
                                                Edit
                                            </button>
                                            {{-- <form action="{{   route('admin.tuition-payment-delete', $tuitions->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                    <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.tuition.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>
                            Showing {{ $tuition->firstItem() }} to {{ $tuition->lastItem() }} of {{ $tuition->total() }} Entries
                            @if($tuition->hasMorePages())
                                <a href="{{ $tuition->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($tuition->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $tuition->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($tuition->getUrlRange(1, $tuition->lastPage()) as $page => $url)
                                        <li class="page-item {{ $tuition->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($tuition->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $tuition->nextPageUrl() }}">Next</a>
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
