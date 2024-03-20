@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">International Flight</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">International Flight</a></li>
                    <li class="breadcrumb-item active" aria-current="page">International Flight</li>
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
                                    <th scope="col">International Flight From</th>
                                    <th scope="col">International Flight Departure</th>
                                    <th scope="col">Return</th>
                                    <th scope="col">On Way</th>
                                    <th scope="col">Date of Departure</th>
                                    <th scope="col">Number of Passengers</th>
                                    <th scope="col">Travel Class</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Baggage</th>
                                    <th scope="col">First Name On Passport</th>
                                    <th scope="col">Last Name On Passport</th>
                                    <th scope="col">Gender On Passport</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($internationalflight as $key => $internationalflights)
                                  @if (optional($internationalflights->user)->retention != 1)
                                    <tr scope="row">
                                        <th>{{  $key + 1 }}</th>
                                        <th>{{  $internationalflights->user->name }}</th>
                                        <td>{{  $internationalflights['airport_location_from'] }}</td>
                                        <td>{{  $internationalflights['airport_location_to'] }}</td>
                                        <td>
                                            @if ($internationalflights['flight_return_date'] == null)
                                            Not specify  
                                            @else
                                            {{  $internationalflights['flight_return_date'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($internationalflights['round_trip'] == null)
                                                Not specify 
                                            @else
                                                {{ $internationalflights['round_trip'] }}
                                            @endif
                                        </td>
                                        <td>{{  $internationalflights['flight_date'] }}</td>
                                        <td>{{  $internationalflights['number_passenger'] }}</td>
                                        <td>{{  $internationalflights['flight_class'] }}</td>
                                        <td>
                                            {{  $internationalflights['passenger_title']  }}
                                        </td>
                                        <td>
                                            {{  $internationalflights['baggage_weight']kg }}
                                        </td>
                                        <td>
                                            {{  $internationalflights['passenger_fname_onpassport']  }}
                                        </td>
                                        <td>
                                            {{  $internationalflights['passenger_lastname_onpassport']  }}
                                        </td>
                                        <td>
                                            {{  $internationalflights['passenger_gender_onpassport']  }}
                                        </td>
                                        <td>
                                            {{   $internationalflights['date_of_birth'] }}
                                        </td>
                                        <th>{{  $internationalflights['passenger_email'] }}</th>
                                        <th>{{  $internationalflights['passenger_phone'] }}</th>
                                        <th>{{  $internationalflights->created_at->format('m-d-y h:s A') }}</th>
                                        <td>
                                            <form action="{{   route('admin.international-delete', $internationalflights->id) }}" method="post">
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
                            Showing {{ $internationalflight->firstItem() }} to {{ $internationalflight->lastItem() }} of {{ $internationalflight->total() }} Entries
                            @if($internationalflight->hasMorePages())
                                <a href="{{ $internationalflight->nextPageUrl() }}">
                                    <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                </a>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    @if($internationalflight->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);">
                                                Prev
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $internationalflight->previousPageUrl() }}">
                                                Prev
                                            </a>
                                        </li>
                                    @endif
                
                                    @foreach($internationalflight->getUrlRange(1, $internationalflight->lastPage()) as $page => $url)
                                        <li class="page-item {{ $internationalflight->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    @if($internationalflight->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $internationalflight->nextPageUrl() }}">Next</a>
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
