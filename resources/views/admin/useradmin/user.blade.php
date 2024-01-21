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
                                    {{-- <th scope="col">State</th>
                                    <th scope="col">City</th> --}}
                                    <th scope="col">Country</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user) != 0)
                                    @foreach ($user as $usering)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{  $usering->name }}</td>
                                        <td>
                                            @if (!$usering->userwallet == null)
                                               {{   number_format($usering->userwallet->amount, 2) }}
                                            @else
                                                0.00
                                            @endif
                                        </td>
                                        <td>{{  $usering->email }}</td>
                                        <td>{{  $usering->phone }}</td>
                                        {{-- <td>{{  $usering->state }}</td>
                                        <td>{{  $usering->city }}</td> --}}
                                        <td>{{  $usering->country }}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{ route('admin.edit-user-page', $usering->id) }}"
                                                    class="btn btn-primary btn-sm btn-info-transparent"><i
                                                        class="ri-edit-line"></i></a>
                                                
                                                <a href="{{ route('admin.users.ban', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-ban').submit();"
                                                    class="btn btn-sm btn-info-transparent btn-wave">
                                                    Ban User
                                                </a>
                                                <a href="{{ route('admin.users.unban', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-unban').submit();"
                                                    class="btn btn-sm btn-warning-transparent btn-wave">
                                                    Unban User
                                                </a>
                                                <a href="{{ route('admin.user-delete', $usering->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                                                    class="btn btn-sm btn-danger-transparent btn-wave"><i
                                                        class="ri-delete-bin-line"></i>
                                                </a>
                                                <form id="delete-ban" clas="d-none" action="{{ route('admin.users.ban', $usering->id) }}" method="post">
                                                    @method('put')
                                                    @csrf
                                                </form>
                                                <form id="delete-unban" clas="d-none" action="{{ route('admin.users.unban', $usering->id) }}" method="post">
                                                    @method('put')
                                                    @csrf
                                                </form>
                                                <form id="delete-form" clas="d-none" onclick="return confirm('Are you sure?');" action="{{ route('admin.user-delete', $usering->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>        
                                            </div>
                                        </td>
                                    </tr>
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



@endsection
<script>
    ClassicEditor
        .create(document.getElementById('summary-body'))
        .catch(error => {
            console.error(error);
        });
</script>
