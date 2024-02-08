<div class="modal fade" id="staticBackdrop-{{ $adminUsers->id }}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">       
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">
                    Reset Password
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.change-user-password', $adminUsers->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $adminUsers->id }}">
                    <div class="d-flex align-items-top justify-content-between">
                        <div class="col-lg-12">
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

<div class="modal fade" id="edituser-{{ $adminUsers->id }}" tabindex="-1" data-bs-keyboard="false" aria-hidden="true">       
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('admin.admin-user-edit', $adminUsers->id) }}" method="post">
                    @csrf
                    @method('put')
                    <h6 class="fw-semibold mb-3">Profile :</h6>
                    <div class="row gy-4 mb-4">
                        <div class="col-xl-12 col-12">
                            <label for="first-name" class="form-label">Full Name</label>
                            <input type="text" name="name" value="{{ $adminUsers->name }}" class="form-control" id="first-name"
                                placeholder="Full Name" />
                        </div>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xl-12 col-12">
                            <label for="first-name" class="form-label">Role</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="" selected>Select</option>
                                <option value="administrator" {{ $adminUsers->role_as == 'administrator' ? 'selected' : ''  }}>Administrator</option>
                                <option value="employee" {{ $adminUsers->role_as == 'employee' ? 'selected' : ''  }}>Employee</option>
                                <option value="staff" {{ $adminUsers->role_as == 'staff' ? 'selected' : ''  }}>Staff</option>
                           </select>
                        </div>
                    </div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xl-6">
                            <label for="email-address" class="form-label">Email Address :</label>
                            <input type="email" name="email" value="{{ $adminUsers->email }}" class="form-control" id="email-address"
                                placeholder="" />
                        </div>

                        <div class="col-xl-6">
                            <label for="Contact-Details" class="form-label">Phone Number:</label>
                            <input type="number" name="phone" value="{{ $adminUsers->phone }}" class="form-control" id="Contact-Details"
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
</div>

