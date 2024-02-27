@extends('layout.master-2')
@section('content')
    <div class="container">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Account Settings</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                          Account Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->
        <div class="row mb-5">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header d-sm-flex d-block">
                        <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                            <li class="nav-item m-1">
                                <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                                    href="#personal-info" aria-selected="true">Personal Information</a>
                            </li>
                            <li class="nav-item m-1">
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                    href="#account-settings" aria-selected="true">Account Settings</a>
                            </li>
                            <li class="nav-item m-1">
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#email-settings"
                                  aria-selected="true">Create An Account</a>
                            </li>
                            <li class="nav-item m-1">
                                <a class="nav-link" href="#saff" data-bs-toggle="tab" role="tab" aria-current="page" aria-selected="true">
                                    Employee Information
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="personal-info" role="tabpanel">
                                <div class="p-sm-3 p-0">
                                    <h6 class="fw-semibold mb-3">Photo :</h6>
                                    <form action="{{ route('admin.update-profile-page', $admin->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="mb-4 d-sm-flex align-items-center">
                                            <div class="mb-0 me-5">
                                                <span class="avatar avatar-xxl avatar-rounded">
                                                    <img src="/vendors/assets/images/faces/9.jpg" alt="" id="profile-img" />
                                                    <a href="javascript:void(0);"
                                                        class="badge rounded-pill bg-primary avatar-badge">
                                                        <input type="file" name="photo"
                                                            class="position-absolute w-100 h-100 op-0" id="profile-change" />
                                                        <i class="fe fe-camera"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold mb-3">Profile :</h6>
                                        <div class="row gy-4 mb-4">
                                            <div class="col-xl-12 col-12">
                                                <label for="first-name" class="form-label">Full Name</label>
                                                <input type="text" name="name" value="{{ $admin->name }}" class="form-control" id="first-name"
                                                    placeholder="Full Name" />
                                            </div>
                                        </div>
                                        <div class="row gy-4 mb-4">
                                            <div class="col-xl-6">
                                                <label for="email-address" class="form-label">Email Address :</label>
                                                <input type="email" name="email" value="{{ $admin->email }}" class="form-control" id="email-address"
                                                    placeholder="" />
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="Contact-Details" class="form-label">Phone Number:</label>
                                                <input type="number" name="phone" value="{{ $admin->phone }}" class="form-control" id="Contact-Details"
                                                    placeholder="contact details" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary m-1">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="account-settings" role="tabpanel">
                                @if ($admin->role_as == 'administrator')
                                <div class="row gap-3 justify-content-between">
                                    <div class="col-xl-12">
                                        <div class="card custom-card shadow-none mb-0 border">
                                            <div class="card-body">
                                                <form action="{{ route('admin.change-password-page', $admin->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        <div class="col-lg-12">
                                                            <p class="fs-14 mb-1 fw-semibold">
                                                                Reset Password
                                                            </p>
                                                            <div class="row">
                                                              <div class="col-md-12 mb-2">
                                                                <label for="current-password"  class="form-label">Current
                                                                    Password</label>
                                                                <input type="password" name="current_password" class="form-control form-control"
                                                                    id="current-password" placeholder="Current Password" />
                                                              </div>
                                                              <div class="col-md-12 mb-2">
                                                                  <label for="new-password" class="form-label">New
                                                                      Password</label>
                                                                  <input type="password" name="new_password" class="form-control" id="new-password"
                                                                      placeholder="New Password" />
                                                              </div>
                                                              <div class="col-md-12 mb-4">
                                                                  <label for="confirm-password" class="form-label">Confirm
                                                                      Password</label>
                                                                  <input type="password" name="Confirm_password" class="form-control"
                                                                      id="confirm-password" placeholder="Confirm PAssword" />
                                                              </div>
                                                              <div class="col-md-12 mb-0">
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-primary m-1">Save Changes</button>
                                                                    </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="p-3">
                                        <h5>You are permitted to create an account as a {{ $admin->role_as }}</h5>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane p-0" id="email-settings" role="tabpanel">
                                @if ($admin->role_as == 'administrator')
                                <form action="{{ route('admin.register') }}" method="POST" class="p-4">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                          <label for="fullname"  class="form-label">Full Name</label>
                                          <input type="text" name="name" class="form-control"
                                              id="fullname" placeholder="Name"  required>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                          <label for="email"  class="form-label">Email</label>
                                          <input type="text" name="email" class="form-control"
                                              id="email" placeholder="Email Address"  required>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                          <label for="phone"  class="form-label">Phone Number</label>
                                          <input type="text" name="phone" class="form-control"
                                              id="phone" placeholder="Phone Number"  required>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                          <label for="phone"  class="form-label">Role</label>
                                          <select name="role_as" id="" class="form-control" required>
                                               <option value="" selected>Select</option>
                                               <option value="administrator">Administrator</option>
                                               <option value="employee">Employee</option>
                                               <option value="staff">Staff</option>
                                          </select>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="newpassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="newpassword"
                                                placeholder="Password"  required>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="confirm-password" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" name="confirm_password" class="form-control"
                                                id="confirm-password" placeholder="Confirm PAssword"  required>
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary m-1">Create Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                    <div class="p-3">
                                        <h5>You are permitted to create an account as a {{ $admin->role_as }}</h5>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="saff" role="tabpanel">
                                @if ($admin->role_as == 'administrator')
                                <div class="card custom-card">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($adminUser as $adminUsers)
                                                <tr>
                                                    <td>{{  $loop->index + 1 }}</td>
                                                    <td scope="row">
                                                        {{  $adminUsers->name }}
                                                    </td>
                                                    <td scope="row">
                                                        {{  $adminUsers->email }}
                                                    </td>
                                                    <td>{{ $adminUsers->phone }}</td>
                                                    <td>
                                                        <span class="badge bg-success-transparent">{{ $adminUsers->role_as }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="hstack gap-2 flex-wrap">
                                                            <button class="btn btn-sm btn-warning btn-wave waves-effect waves-light" data-bs-toggle="modal"
                                                            data-bs-target="#edituser-{{ $adminUsers->id }}">
                                                                <i class="ri-edit-line align-middle me-2 d-inline-block"></i>Edit
                                                            <button class="btn btn-sm btn-info btn-wave waves-effect waves-light" data-bs-toggle="modal"
                                                              data-bs-target="#staticBackdrop-{{ $adminUsers->id }}">
                                                                <i class="ri-lock align-middle me-2 d-inline-block"></i>Change Password
                                                            </button>
                                                            <button  class="btn btn-sm btn-danger btn-wave waves-effect waves-light">
                                                                <a href="{{ route('admin.admin.delete.users', $adminUsers->id) }}" class="text-white fs-14 lh-1" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                                                    <i class="ri-delete-bin-line align-middle me-2 d-inline-block"></i>Delete
                                                                </a>
                                                            </button>
                                                            <form id="delete-form" clas="d-none" onclick="return confirm('Are you sure?');" action="{{ route('admin.admin.delete.users', $adminUsers->id) }}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                            </form> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('admin.profile.edit')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>   
                                @else
                                <div class="p-3">
                                    <h5>You are permitted to create an account as a {{ $admin->role_as }}</h5>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!--End::row-1 -->
    </div>
@endsection
