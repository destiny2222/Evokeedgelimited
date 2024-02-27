@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Merchandise </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Merchandise </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Merchandise </li>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($merchandise as $key => $merchandiser)
                                    @if(optional($merchandise->user)->retention != 1)
                                        <tr scope="row">
                                            <th>{{  $key + 1 }}</th>
                                            <th>{{  $merchandiser->user->name }}</th>
                                            <td>{{  $merchandiser['description'] }}</td>
                                            <td>{{  $merchandiser['currency'] }}</td>
                                            <td>{{  $merchandiser['seller_name'] }}</td>
                                            <td>{{  $merchandiser['email_supplier'] }}</td>
                                            <td>{{  $merchandiser['bank_amount_name'] }}</td>
                                            <td>{{  $merchandiser['bank_account_number'] }}</td>
                                            <td>{{  $merchandiser['bank_swift_code'] }}</td>
                                            <td>
                                                {{  $merchandiser['bank_route_number']  }}
                                            </td>
                                            <td>
                                                {{  $merchandiser['bank_reference_number']  }}
                                            </td>
                                            <td>{{  $merchandiser['recipient']  }}</td>
                                            <td>{{  $merchandiser['country']  }}</td>
                                            <td>{{  $merchandiser['city']  }}</td>
                                            <td>{{  $merchandiser['payment_method']  }}</td>
                                            <td>{{  $merchandiser['postcode']  }}</td>
                                            <td>
                                                {{  number_format($merchandiser['total_amount'])  }}
                                            </td>
                                            <td>
                                                {{  number_format( $merchandiser['amount'] ) }}
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
                                                {{  $merchandiser->created_at->format('m-d-y h:s A') }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $merchandiser->id }}" class="btn btn-sm btn-info btn-wave">
                                                        <i class="ri-edit-line"></i>
                                                        Edit
                                                    </button>
                                                    {{-- <form action="{{   route('admin.merchandise-delete', $merchandiser->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                            <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                        </button>
                                                    </form> --}}
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.merchandise.edit')
                                    @endif    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>
                            Showing {{ $merchandise->firstItem() }} to {{ $merchandise->lastItem() }} of {{ $merchandise->total() }} Entries
                            @if($merchandise->hasMorePages())
                                <a href="{{ $merchandise->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($merchandise->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $merchandise->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($merchandise->getUrlRange(1, $merchandise->lastPage()) as $page => $url)
                                        <li class="page-item {{ $merchandise->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($merchandise->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $merchandise->nextPageUrl() }}">Next</a>
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
