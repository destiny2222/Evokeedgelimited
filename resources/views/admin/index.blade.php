@extends('layout.master-2')
@section('content')
    <div class="container-fluid">
        <!-- Start::page-header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <p class="fw-semibold fs-18 mb-0">{{  $admin->name }}</p>
                <span class="fs-semibold text-muted">Track your sales activity, leads and deals here.</span>
            </div>
        </div>
        <!-- End::page-header -->
        <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xxl-9 col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xxl-4 col-lg-4 col-md-4 col-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <span class="avatar avatar-md avatar-rounded bg-primary">
                                                        <i class="ti ti-users fs-16"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <!-- Your HTML code for displaying user count and percentage increase -->
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div>
                                                            <p class="text-muted mb-0">Total Customers</p>
                                                            <h4 class="fw-semibold mt-1">{{ $user_count }}</h4>
                                                        </div>
                                                        <div id="crm-total-customers"></div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                                        <div>
                                                            <a class="text-primary" href="{{ route('admin.user-page') }}">View All<i class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                        </div>
                                                        <div class="text-end">
                                                            <p class="mb-0 text-success fw-semibold">
                                                                {{ sprintf("%.2f%%", $percentageIncrease) }}
                                                            </p>
                                                            <span class="text-muted op-7 fs-11">this month</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-4 col-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                        <i class="ti ti-plane-inflight fs-16"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div>
                                                            <p class="text-muted mb-0">Flight Booking</p>
                                                            <h4 class="fw-semibold mt-1">{{  $localflight  }}</h4>
                                                        </div>
                                                        <div id="crm-total-revenue"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mt-1">
                                                        <div>
                                                            <a class="text-secondary"
                                                                href="{{ route('admin.international-flight-page')  }}">View All<i
                                                                    class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                        </div>
                                                        <div class="text-end">
                                                            <p class="mb-0 text-success fw-semibold">
                                                                {{ sprintf("%.2f%%", $FlightIncrease) }}
                                                            </p>
                                                            <span class="text-muted op-7 fs-11">this month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-4 col-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <span class="avatar avatar-md avatar-rounded bg-success">
                                                        <i class='bx bxl-visa fs-30'></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div>
                                                            <p class="text-muted mb-0">
                                                                Visa Fee
                                                            </p>
                                                            <h4 class="fw-semibold mt-1">{{   $visafee  }}</h4>
                                                        </div>
                                                        <div id="crm-conversion-ratio"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mt-1">
                                                        <div>
                                                            <a class="text-success" href="{{ route('admin.visa-application-page')  }}">View
                                                                All<i
                                                                    class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                        </div>
                                                        <div class="text-end">
                                                            <p class="mb-0 text-danger fw-semibold">
                                                                {{ sprintf("%.2f%%", $visafee) }}
                                                            </p>
                                                            <span class="text-muted op-7 fs-11">this month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-4 col-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <span class="avatar avatar-md avatar-rounded bg-warning">
                                                        <i class="ti ti-briefcase fs-16"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div>
                                                            <p class="text-muted mb-0">Merchandise Payment</p>
                                                            <h4 class="fw-semibold mt-1">{{   $merchandise  }}</h4>
                                                        </div>
                                                        <div id="crm-total-deals"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mt-1">
                                                        <div>
                                                            <a class="text-warning" href="{{ route('admin.merchandise-page') }}">View
                                                                All<i
                                                                    class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                        </div>
                                                        <div class="text-end">
                                                            <p class="mb-0 text-success fw-semibold">
                                                                {{ sprintf("%.2f%%", $merchandiseIncrease) }}
                                                            </p>
                                                            <span class="text-muted op-7 fs-11">this month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-4 col-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <span class="avatar avatar-md p-2 bg-teal"> 
                                                        <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"> 
                                                            <g> <rect fill="none" height="24" width="24"></rect> <g>
                                                                 <path d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z"></path> 
                                                                </g> 
                                                                <path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z"></path> 
                                                            </g> 
                                                        </svg> 
                                                    </span>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div>
                                                            <p class="text-muted mb-0">Corporate Service</p>
                                                            <h4 class="fw-semibold mt-1">{{  $corporateservice  }}</h4>
                                                        </div>
                                                        <div id="crm-total-deals"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mt-1">
                                                        <div>
                                                            <a class="text-warning" href="{{ route('admin.corporate-service-page') }}">View
                                                                All<i
                                                                    class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                        </div>
                                                        <div class="text-end">
                                                            <p class="mb-0 text-success fw-semibold">
                                                                {{ sprintf("%.2f%%", $corporateserviceIncrease) }}
                                                            </p>
                                                            <span class="text-muted op-7 fs-11">this month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-4 col-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <span class="avatar avatar-md avatar-rounded bg-warning">
                                                        <i class="ti ti-wave-square fs-16"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div>
                                                            <p class="text-muted mb-0">OtherService Payment</p>
                                                            <h4 class="fw-semibold mt-1">{{   $otherservice  }}</h4>
                                                        </div>
                                                        <div id="crm-total-deals"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mt-1">
                                                        <div>
                                                            <a class="text-warning" href="{{ route('admin.otherservices-page') }}">View
                                                                All<i
                                                                    class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                        </div>
                                                        <div class="text-end">
                                                            <p class="mb-0 text-success fw-semibold">
                                                                {{ sprintf("%.2f%%", $otherserviceIncrease) }}
                                                            </p>
                                                            <span class="text-muted op-7 fs-11">this month</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">Transaction History</div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-hover border table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="row" class="ps-4">
                                                      Id
                                                    </th>
                                                    <th scope="col">Sales Rep</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Mail</th>
                                                    <th scope="col">Location</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="ps-4">
                                                      1
                                                    </th>
                                                    <td>
                                                        <div class="d-flex align-items-center fw-semibold">
                                                            <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                <img src="../assets/images/faces/4.jpg" alt="img" />
                                                            </span>Mayor Kelly
                                                        </div>
                                                    </td>
                                                    <td>Manufacture</td>
                                                    <td>mayorkelly@gmail.com</td>
                                                    <td>
                                                        <span class="badge bg-info-transparent">Germany</span>
                                                    </td>
                                                    <td>Sep 15 - Oct 12, 2023</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i
                                                                    class="ri-download-2-line"></i></a>
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i
                                                                    class="ri-edit-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="ps-4">
                                                      2
                                                    <td>
                                                        <div class="d-flex align-items-center fw-semibold">
                                                            <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                <img src="../assets/images/faces/15.jpg"
                                                                    alt="img" /> </span>Andrew Garfield
                                                        </div>
                                                    </td>
                                                    <td>Development</td>
                                                    <td>andrewgarfield@gmail.com</td>
                                                    <td>
                                                        <span class="badge bg-primary-transparent">Canada</span>
                                                    </td>
                                                    <td>Apr 10 - Dec 12, 2023</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i
                                                                    class="ri-download-2-line"></i></a>
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i
                                                                    class="ri-edit-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="ps-4">
                                                      3
                                                    </th>
                                                    <td>
                                                        <div class="d-flex align-items-center fw-semibold">
                                                            <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                <img src="../assets/images/faces/11.jpg"
                                                                    alt="img" /> </span>Simon Cowel
                                                        </div>
                                                    </td>
                                                    <td>Service</td>
                                                    <td>simoncowel234@gmail.com</td>
                                                    <td>
                                                        <span class="badge bg-danger-transparent">Europe</span>
                                                    </td>
                                                    <td>Sep 15 - Oct 12, 2023</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i
                                                                    class="ri-download-2-line"></i></a>
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i
                                                                    class="ri-edit-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="ps-4">
                                                      4
                                                    </th>
                                                    <td>
                                                        <div class="d-flex align-items-center fw-semibold">
                                                            <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                <img src="../assets/images/faces/8.jpg" alt="img" />
                                                            </span>Mirinda Hers
                                                        </div>
                                                    </td>
                                                    <td>Marketing</td>
                                                    <td>mirindahers@gmail.com</td>
                                                    <td>
                                                        <span class="badge bg-warning-transparent">USA</span>
                                                    </td>
                                                    <td>Apr 14 - Dec 14, 2023</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i
                                                                    class="ri-download-2-line"></i></a>
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i
                                                                    class="ri-edit-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="ps-4">
                                                      5
                                                    </th>
                                                    <td>
                                                        <div class="d-flex align-items-center fw-semibold">
                                                            <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                <img src="../assets/images/faces/9.jpg" alt="img" />
                                                            </span>Jacob Smith
                                                        </div>
                                                    </td>
                                                    <td>Social Plataform</td>
                                                    <td>jacobsmith@gmail.com</td>
                                                    <td>
                                                        <span class="badge bg-success-transparent">Singapore</span>
                                                    </td>
                                                    <td>Feb 25 - Nov 25, 2023</td>
                                                    <td>
                                                        <div class="hstack gap-2 fs-15">
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i
                                                                    class="ri-download-2-line"></i></a>
                                                            <a aria-label="anchor" href="javascript:void(0);"
                                                                class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i
                                                                    class="ri-edit-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            Showing 5 Entries
                                            <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                        </div>
                                        <div class="ms-auto">
                                            <nav aria-label="Page navigation" class="pagination-style-4">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="javascript:void(0);">
                                                            Prev
                                                        </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="javascript:void(0);">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link text-primary"
                                                            href="javascript:void(0);">
                                                            next
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                
                </div>
            </div>
        <!-- End::row-1 -->
    </div>  
    
@endsection


