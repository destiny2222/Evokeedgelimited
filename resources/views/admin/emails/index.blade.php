@extends('layout.master-2')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grid Card -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Mail</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Mail</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="text-end mb-3">
            <a href="{{ route('admin.send-mail-create') }}" class="btn  btn-primary btn-wave">
                Send Mail
            </a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($sendmail as  $mail)
                                <tr scope="row">
                                    <th>{{  $loop->index + 1 }}</th>
                                    <td>{{  $mail->user->name }}</td>
                                    <td>{{  $mail->user->email }}</td>
                                    <td>{{  $mail->subject }}</td>
                                    <td>
                                        {{  $mail->message }}
                                    </td>
                                    <td>
                                        {{  $mail->created_at->format('m-d-y h:s A') }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable3{{ $mail->id }}">
                                            View Mail
                                        </button>
                                        <form action="{{ route('admin.send-mail-delete', $mail->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger btn-wave">
                                                <i class="ri-delete-bin-line align-middle  d-inline-block"></i>Delete
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.emails.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--End::row-1 --> 
</div>
@endsection
