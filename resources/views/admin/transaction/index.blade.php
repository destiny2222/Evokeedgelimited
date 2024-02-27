@extends('layouts.master-2')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Grid Card -->
        <div class="row">
            <div class="col-xl">
                {{-- <h6 class="pb-1 mb-4 text-muted">Add Deposit</h6> --}}
            </div>
            <div class="col-xl text-end">
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    <span class="tf-icons bx bx-add-to-queue"></span>&nbsp; Add New Last Deposit
                </button> --}}
            </div>
        </div>


        <div class="row">

            <!-- Hoverable Table rows -->
            <div class="card">

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          @if (count($transaction) != 0)
                            @foreach ($transaction as $transactions)
                            @if (optional($transactions->user)->retention != 1)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    {{-- <td>{{ $transactions->user->name }}</td> --}}
                                    <td>{{ $transactions->user->lastname}}</td>
                                    <td>{{ $transactions->created_at->format('H-i-Y') }}</td>
                                    <td>{{ $transactions->amount }}</td>
                                    <td>
                                        @if ($transactions->status == 0 )
                                        <span class="badge bg-label-warning me-1">Pending</span>
                                        @else
                                        <span class="badge bg-label-success me-1">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $transactions->created_at->format('m-d-y h:s A') }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"  data-bs-toggle="modal"
                                                data-bs-target="#modalTop{{ $transactions->id }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                <form action="{{ route('admin.transaction.destroy', $transactions->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="px-2 btn" onclick="return confirm('Are you sure?');><i class=" bx bxs-trash me-1"></i>Delete</button>
                                                </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @include('admin.transaction.edit')
                            @endif    
                            @endforeach
                          @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Hoverable Table rows -->

        </div>

        <div class="row" aria-label="Page navigation">
            <div class="pagination justify-content-center">
                {{-- {{ $deposit->links() }} --}}
            </div>
        </div>
    </div>

    @include('admin.transaction.create')

@endsection
<script>
    ClassicEditor
        .create(document.getElementById('summary-body'))
        .catch(error => {
            console.error(error);
        });
</script>
