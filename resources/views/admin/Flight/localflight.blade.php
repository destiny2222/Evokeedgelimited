@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Local Flight </h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Local Flight </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Local Flight </li>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($localflight as $key => $localflights)
                                  @if (optional($localflights->user)->retention != '1')
                                    <tr scope="row">
                                        <th>{{  $key + 1 }}</th>
                                        <th>{{  $localflights->user->name }}</th>
                                        <td>{{  $localflights['airport_location_from'] }}</td>
                                        <td>{{  $localflights['airport_location_to'] }}</td>
                                        <td>{{  $localflights['flight_date'] }}</td>
                                        <td>{{  $localflights['flight_class'] }}</td>
                                        <td>
                                            @if ($localflights['adult'] == null)
                                            no specify
                                            @else
                                            {{  $localflights['adult'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($localflights['child'] == null)
                                            no specify
                                            @else
                                            {{  $localflights['child'] }}</td>
                                            @endif
                                        <td>
                                            @if ($localflights['infant'] == null)
                                            no specify
                                            @else
                                                {{  $localflights['infant']  }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($localflights['on_way'] == null)
                                                no specify
                                            @else
                                            {{  $localflights['on_way']  }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($localflights['round_trip'] == null)
                                            no specify
                                            @else
                                            {{  $localflights['round_trip']  }}
                                            @endif
                                        </td>
                                        <td>
                                            {{  $localflights['gender']  }}
                                        </td>
                                        <th>{{  $localflights['title'] }}</th>
                                        <th>{{  $localflights['date_birth_date'] }}</th>
                                        <th>{{  $localflights['first_name'] }}</th>
                                        <th>{{  $localflights['last_name'] }}</th>
                                        <th>{{  $localflights['nationality'] }}</th>
                                        <th>{{  $localflights['phone'] }}</th>
                                        <th>{{  $localflights['email'] }}</th>
                                        <th>{{  $localflights->created_at->format('m-d-y h:s A') }}</th>
                                        <td>
                                            <form action="{{   route('admin.Local-delete', $localflights->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                    <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                                </button>
                                            </form>
                                        </td>
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
                            Showing {{ $localflight->firstItem() }} to {{ $localflight->lastItem() }} of {{ $localflight->total() }} Entries
                            @if($localflight->hasMorePages())
                                <a href="{{ $localflight->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($localflight->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $localflight->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($localflight->getUrlRange(1, $localflight->lastPage()) as $page => $url)
                                        <li class="page-item {{ $localflight->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($localflight->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $localflight->nextPageUrl() }}">Next</a>
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
