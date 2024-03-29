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
                                        <th scope="col">First name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Marital Status</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Nationality</th>
                                        {{-- <th scope="col">Address</th>
                                        <th scope="col">Address 2</th> --}}
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
                                          @if(optional($events->user)->retention != 1)
                                            <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar me-2 avatar-rounded">
                                                                @if(pathinfo($events->documents, PATHINFO_EXTENSION) == 'pdf')
                                                                <iframe id="pdf-iframe1" src="{{ asset('storage/kyc/document/'.$events->documents) }}" frameborder="0" scrolling="no"   style="width:60px; height:50px;" ></iframe>
                                                                <span class="btn btn-primary fullscreen-button" data-iframe-id="pdf-iframe1">View</span>
                                                                @else
                                                                <img src="{{ asset('storage/kyc/document/'.$events->documents) }}" alt="img" class="fullscreen-element"  />
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar me-2 avatar-rounded">
                                                                @if(pathinfo($events->proof_of_address, PATHINFO_EXTENSION) == 'pdf')
                                                                    <iframe id="pdf-iframe2" src="{{ asset('storage/kyc/proof/'.$events->proof_of_address) }}" frameborder="0" scrolling="no"   style="width:60px; height:50px;"></iframe>
                                                                    <span class="btn btn-primary fullscreen-button" data-iframe-id="pdf-iframe2">View</span>
                                                                @else
                                                                    <img src="{{ asset('storage/kyc/proof/'.$events->proof_of_address) }}" alt="img" class="fullscreen-element"  />
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
                                                        <span>{{ $events->user->last_name  }}</span>
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
                                                    {{-- <td>
                                                        <span>{{ $events->street_address  }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $events->street_address_2  }}</span>
                                                    </td> --}}
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
                                          @endif  
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
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script>
        const fullscreenButtons = document.querySelectorAll(".fullscreen-button");

fullscreenButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const iframeId = button.getAttribute("data-iframe-id");
        const pdfIframe = document.getElementById(iframeId);

        if (document.fullscreenEnabled) {
            if (pdfIframe.requestFullscreen) {
                pdfIframe.requestFullscreen();
            } else if (pdfIframe.mozRequestFullScreen) {
                pdfIframe.mozRequestFullScreen();
            } else if (pdfIframe.webkitRequestFullscreen) {
                pdfIframe.webkitRequestFullscreen();
            }
        }
    });
});
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.fullscreen-element').forEach(function (element) {
                element.addEventListener('click', function () {
                    toggleFullScreen(element);
                });
            });
        });

        function toggleFullScreen(element) {
            if (!document.fullscreenElement) {
                if (element.requestFullscreen) {
                    element.requestFullscreen().catch(err => {
                        console.error(`Error attempting to enable full-screen mode: ${err.message}`);
                    });
                } else if (element.webkitRequestFullscreen) { /* Safari */
                    element.webkitRequestFullscreen().catch(err => {
                        console.error(`Error attempting to enable full-screen mode: ${err.message}`);
                    });
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }
    </script>
@endsection


