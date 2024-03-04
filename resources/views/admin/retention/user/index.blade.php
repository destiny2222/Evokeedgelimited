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

                    {{-- <div class="d-flex justify-content-between gap-3">
                        <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable3">View pending balance</button>
                        <button class="btn btn-primary"  type="submit" onclick="event.preventDefault(); document.getElementById('update-balance').submit();">Update Balances</button>
                        <form method="post" id="update-balance" class="d-none"  action="{{ route('admin.update-balances') }}">
                            @csrf
                        </form>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Date of Registeration</th>
                                    <th scope="col">Date of Closure</th>
                                    {{-- <th scope="col">Phone Number</th>
                                    <th scope="col">kyc status</th>
                                    <th scope="col">Pending Balance</th>
                                    <th scope="col">Country</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user) != 0)
                                    @foreach ($user as $usering)
                                        @if (optional($usering)->retention == '1')
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{  $usering->name }}</td>
                                                <td>
                                                    {{  $usering->created_at }}
                                                </td>
                                                <td>{{  $usering->updated_at }}</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="{{ route('admin.user.retention.details', $usering->id) }}" class="btn btn-sm btn-primary-transparent btn-wave">
                                                            View Details
                                                        </a>
                                                        {{-- @if ($usering->retention == 0)
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
                                                        <form id="retention-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.retention', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form>
                                                        <form id="delete-unretention-{{ $usering->id }}" class="d-none" action="{{ route('admin.users.unretention', $usering->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                        </form> --}}
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

@endsection
<script>
    ClassicEditor
        .create(document.getElementById('summary-body'))
        .catch(error => {
            console.error(error);
        });
</script>
