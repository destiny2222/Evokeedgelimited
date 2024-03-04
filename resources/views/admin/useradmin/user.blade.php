@extends('layout.master-2')
@section('content')

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Users</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Users
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

  
    <!-- Start:: row-7 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Users Table</div>

                    <div class="d-flex justify-content-between gap-3">
                        <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable3">View pending balance</button>
                        <button class="btn btn-primary"  type="submit" onclick="event.preventDefault(); document.getElementById('update-balance').submit();">Update Balances</button>
                        <form method="post" id="update-balance" class="d-none"  action="{{ route('admin.update-balances') }}">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">kyc status</th>
                                    <th scope="col">Pending Balance</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user) != 0)
                                    @foreach ($user as $usering)
                                        @if (optional($usering)->retention != 1)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{  $usering->name }}</td>
                                                <td>
                                                    {{  $usering->userwallet ? $usering->userwallet->amount  : 0 }}
                                                </td>
                                                <td>{{  $usering->email }}</td>
                                                <td>{{  $usering->phone }}</td>
                                                <td>{{  $usering->kyc ? $usering->kyc->kyc_status : 'Not Started' }}</td>
                                                <td>{{  $usering->userwallet ? $usering->userwallet->balance : 0}}</td>
                                                <td>{{  $usering->country }}</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="{{ route('admin.edit-user-page', $usering->id) }}"
                                                            class="btn btn-primary btn-sm btn-info-transparent"><i
                                                                class="ri-edit-line"></i></a>
                                                        
                                                        @if ($usering->is_banned == 0)
                                                            <a href="{{ route('admin.users.ban', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('ban-{{ $usering->id }}').submit();"
                                                                class="btn btn-sm btn-info-transparent btn-wave">
                                                                Ban User
                                                            </a>
                                                          @else
                                                            <a href="{{ route('admin.users.unban', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-unban-{{ $usering->id }}').submit();"
                                                                class="btn btn-sm btn-warning-transparent btn-wave">
                                                                Unban User
                                                            </a>
                                                        @endif
                                                        @if ($usering->retention == 0)
                                                            <a href="{{ route('admin.users.retention', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('retention-{{ $usering->id }}').submit();"
                                                                class="btn btn-sm btn-info-transparent btn-wave">
                                                                Retention User
                                                            </a>
                                                            @else
                                                            <a href="{{ route('admin.users.unretention', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-unretention-{{ $usering->id }}').submit();"
                                                                class="btn btn-sm btn-warning-transparent btn-wave">
                                                                Unretention User
                                                            </a>
                                                        @endif
                                                        @if ($usering->access_token == 0)
                                                            <a href="{{ route('admin.users.access', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('access-{{ $usering->id }}').submit();"
                                                                class="btn btn-sm btn-info-transparent btn-wave">
                                                                Enable user access to coporate services
                                                            </a>
                                                        @else
                                                            <a href="{{ route('admin.users.unaccess', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-unaccess-{{ $usering->id }}').submit();"
                                                                class="btn btn-sm btn-warning-transparent btn-wave">
                                                                Disable user access to coporate services
                                                            </a>
                                                        @endif
                                                        {{-- <a href="{ route('admin.user-delete', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                                                            class="btn btn-sm btn-danger-transparent btn-wave"><i
                                                                class="ri-delete-bin-line"></i>
                                                        </a> --}}
                                                        <form id="ban-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.ban', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        <form id="delete-unban-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.unban', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        <form id="retention-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.retention', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        <form id="delete-unretention-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.unretention', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        <form id="access-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.access', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        <form id="delete-unaccess-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.unaccess', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        {{-- <form id="delete-form" clas="d-none" onclick="return confirm('Are you sure?');" action="{{ route('admin.user-delete', $usering->id) }}" method="post">
                                                            method('delete')
                                                            csrf
                                                        </form>         --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif    
                                    @endforeach
                                @endif   
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-none border-top-0">

                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-7 -->
     <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="text-center">
                {{ $user->links() }}
            </div>
        </div>
     </div>
</div>

<div class="modal fade" id="exampleModalScrollable3" tabindex="-1"
    aria-labelledby="exampleModalScrollable3" data-bs-keyboard="false"
    aria-hidden="true">
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Name on transaction</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($userpendingbalance) != 0)
                                @foreach ($userpendingbalance as $userpendingbalances)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{  $userpendingbalances->user->name }}</td>
                                    <td>{{  $userpendingbalances->name }}</td>
                                    <td>{{  $userpendingbalances->balance }}</td>
                                </tr>
                                @endforeach
                            @endif   
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection
<script>
    ClassicEditor
        .create(document.getElementById('summary-body'))
        .catch(error => {
            console.error(error);
        });
</script>
