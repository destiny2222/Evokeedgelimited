@extends('layout.master-2')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Grid Card -->
        <div class="row">
            <div class="col-xl">
                <h6 class="pb-1 mb-4 text-muted">Service</h6>
            </div>
            <div class=" text-end">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTop">
                    Add/Change Baggage
                </button>
            </div>
        </div>
      
        <div class="row">
           
            <div class="col-lg-3 col-12">
                <div class="card custom-card">
                    @if ($baggage)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th scope="col">Local Flight Baggage</th>
                                            <th scope="col">International Flight Baggage</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <tr scope="row">
                                            <td>{{  $baggage['baggage']  }}kg</td>
                                            <td>{{  $baggage['international_baggage']  }}kg</td>
                                                
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $charges->id }}">
                                                    <i class="ri-edit-line align-middle  d-inline-block"></i>
                                                    Edit
                                                    </button> --}}
                                                {{-- <form action="{{ route('admin.transaction-charge-delete', $baggage->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                        <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                    </button>
                                                </form> --}}
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('admin.baggage.edit')
@endsection


