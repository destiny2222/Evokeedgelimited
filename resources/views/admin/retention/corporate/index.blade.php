@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Corporate Service</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Corporate Service</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Corporate Service</li>
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
                                    <th scope="">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Bank Address</th>
                                    <th scope="col">Bank Account Number</th>
                                    <th scope="col">Bank Swift Code</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Total Amount</th>
                                    <th>Time </th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($corporate as $key => $corporates)
                                    @if (optional($corporates->user)->retention == 1)
                                        <tr scope="row">
                                            <th>{{  $key + 1 }}</th>
                                            <th>{{  $corporates->user->name }}</th>
                                            <td>{{  $corporates['name'] }}</td>
                                            <td>{{  $corporates['bank_name'] }}</td>
                                            <td>{{  $corporates['bank_address'] }}</td>
                                            <td>{{  $corporates['bank_account_number'] }}</td>
                                            <td>{{  $corporates['bank_swift_code'] }}</td>
                                            <td>{{  number_format( $corporates['amount'], 2 ) }}</td>
                                            <td>{{  number_format( $corporates['total_amount'], 2 ) }}</td>
                                            <td>{{  $corporates->created_at->format('m-d-y h:s A')  }}</td>
                                            {{-- <td>
                                                <div class="d-flex gap-2">
                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $corporates->id }}" class="btn btn-sm btn-info btn-wave">
                                                        <i class="ri-edit-line"></i>
                                                        Edit
                                                    </button>
                                                    <form action="{{   route('admin.corporate-service-delete', $corporates->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                            <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
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
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>
                            Showing {{ $corporate->firstItem() }} to {{ $corporate->lastItem() }} of {{ $corporate->total() }} Entries
                            @if($corporate->hasMorePages())
                                <a href="{{ $corporate->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($corporate->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $corporate->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($corporate->getUrlRange(1, $corporate->lastPage()) as $page => $url)
                                        <li class="page-item {{ $corporate->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($corporate->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $corporate->nextPageUrl() }}">Next</a>
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
