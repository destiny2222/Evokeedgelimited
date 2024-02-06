@extends('layout.master-2')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Grid Card -->
        <div class="row">
            <div class="col-xl">
                <h6 class="pb-1 mb-4 text-muted">Kyc</h6>
            </div>
        </div>
                    
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Kyc</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Proof of Identification:</th>
                                        <th scope="col">Proof of Address</th>
                                        <th scope="col">Membership Number:</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Marital Status</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Address 2</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Data Sign</th>
                                        <th scope="col">{{ __('Approve Status')  }}</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($kyc) != 0)
                                       @foreach ($kyc as $events)
                                       <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td scope="row">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 avatar-rounded">
                                                        @if(pathinfo($events->documents, PATHINFO_EXTENSION) == 'pdf')
                                                        <iframe src="{{ asset('storage/kyc/document/'.$events->documents) }}" style="width:60px; height:50px;"></iframe>
                                                        @else
                                                        <img src="{{ asset('storage/kyc/document/'.$events->documents) }}" alt="img" class="fullscreen-img" />
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 avatar-rounded">
                                                        @if(pathinfo($events->proof_of_address, PATHINFO_EXTENSION) == 'pdf')
                                                        <iframe src="{{ asset('storage/kyc/proof/'.$events->proof_of_address) }}" style="width:60px; height:50px;"></iframe>
                                                        @else
                                                            <img src="{{ asset('storage/kyc/proof/'.$events->proof_of_address) }}" alt="img" class="fullscreen-img" />
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <span>{{ $events->user->referrence_id  }}</span>
                                            </td>                                                           
                                            <td>
                                                <span>{{ $events->user->name  }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $events->gender  }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $events->marital_status  }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $events->date_birth  }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $events->nationality  }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $events->street_address  }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $events->street_address_2  }}</span>
                                            </td>
                                            <td>
                                                {{ $events->status  }}
                                            </td>
                                            <td>
                                                <span>{{ $events->data_sign  }}</span>
                                            </td>
                                            <td>
                                                @if ($events->kyc_status == 'APPROVED')
                                                   <span class="badge bg-outline-success">Approved</span>
                                                 @elseif($events->kyc_status == 'DECLINED')
                                                   <span class="badge bg-outline-danger">Delined</span>
                                                 @elseif ($events->kyc_status == 'PROCESSING')
                                                   <span class="badge bg-outline-primary">Processing</span>
                                                 @else
                                                 <span class="badge bg-outline-warning">RESUBMIT</span>
                                                @endif
                                            </td>
                                            <td>{{  $events->created_at->format('m-d-y h:s A') }}</td>
                                            <td>
                                                <div class="hstack d-flex gap-2 ">
                                                    <a href="{{ route('admin.kyc.edit', $events->id) }}" class="fs-14 lh-1" >
                                                        <button class="btn btn-primary-gradient btn-wave btn-sm waves-effect waves-light">
                                                            <i class="ri-edit-line"></i>{{ __('Edit') }} 
                                                        </button>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-14 lh-1">
                                                        <form action="{{  route('admin.kyc.destroy', $events->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger btn-wave">
                                                                <i class="ri-delete-bin-line"></i>Delete
                                                            </button>
                                                        </form>
                                                    </a>
                                                </div>
                                            </td>
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
        
        <div class="row" aria-label="Page navigation">
            <div class="pagination justify-content-center">
                {{-- {{ $deposit->links() }} --}}
            </div>
        </div>
    </div>

    <script>
        const fullscreenImages = document.querySelectorAll('.fullscreen-img');
        const fullscreenContainer = document.createElement('div');
        fullscreenContainer.classList.add('fullscreen-container');
        document.body.appendChild(fullscreenContainer);
    
        fullscreenImages.forEach(image => {
            image.addEventListener('click', () => {
                const fullscreenImage = document.createElement('img');
                fullscreenImage.src = image.src;
                fullscreenImage.classList.add('fullscreen-image');
                
                const closeButton = document.createElement('button');
                closeButton.innerText = 'Close';
                closeButton.classList.add('fullscreen-close');
    
                fullscreenContainer.innerHTML = '';
                fullscreenContainer.appendChild(fullscreenImage);
                fullscreenContainer.appendChild(closeButton);
                fullscreenContainer.style.display = 'flex';
    
                closeButton.addEventListener('click', () => {
                    fullscreenContainer.style.display = 'none';
                });
            });
        });
    </script>
    
    
@endsection


