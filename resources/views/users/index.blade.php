@extends('layout.master')
@section('content')
@section('page-title', 'Dashboard')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->
<!-- ROW-1 -->
<div class="row">
  <div class="col-md-12 col-12">
    <div class="media d-flex gap-3 align-items-center mx-4 py-3">
      <div class="icon icon-shape  text-dark rounded-circle shadow">
        <svg id="idCrown" class="text-warning" viewBox="0 0 24 24">
          <path style="fill:#74001D"
            d="M5 16L3 5L8.5 10L12 4L15.5 10L21 5L19 16H5M19 19C19 19.6 18.6 20 18 20H6C5.4 20 5 19.6 5 19V18H19V19Z"
          />
        </svg>
      </div>
      <div class="media-body ml-2">
        <h3 class="mb-0 h2 text-dark font-weight-bolder">Hi {{  $user->name  }}, 👋🏼</h3>
        <p class="mb-1 text-dark">What would you like to do?</p>
      </div>
    </div>
  </div>
</div>
<!-- ROW-2 -->
<div class="row">
  <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xl-12">
    @if ($user->kycIsRequired())
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="media align-items-center">
            <div class="media-body">
                @if($user->kyc && $user->kyc->kyc_status == 'DECLINED')
                    <h2 class="mb-2 font-weight-bolder text-dark">{{__('Your KYC was Declined')}}</h2>
                @else
                    <h2 class="mb-2 font-weight-bolder text-dark">{{__('We need more information about you')}}</h2>
                @endif
                @if($user->kyc && $user->kyc->kyc_status == 'RESUBMIT')
                    <p class="text-dark">{{__('Kindly re-submit your KYC information, and ensure you enter the correct details.')}}</p>
                @else
                    {{-- <p class="text-dark">{{__('Unlock new account privileges by completing your KYC')}}</p> --}}
                    <p class="text-dark">Verify your identity to start enjoying Evokeedge</p>
                @endif
                <a href="{{ route('kyc-page') }}" class="btn btn-primary">Click Here</a>
            </div>
          </div>
        </div>
      </div>
    @endif
   
    @if($user->kycIsProcessing())
      <div class="card mb-3">
          <div class="card-body">
          <div class="row align-items-center">
              <div class="col-12">
              <div class="media align-items-center">
                <div class="media-body">
                  <h2 class="mb-2 font-weight-bolder text-dark">{{__('Your details are review')}}</h2>
                  <p class="text-dark">{{__('You will be notified once your information has been reviewed.')}}</p>
                </div>
              </div>
              </div>
          </div>
          </div>
      </div>
    @endif
  </div>
</div>
<!-- ROW-3 -->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="d-flex">
          <div class="mt-2">
            <h6 class="">Account Balance</h6>
            <h2 class="mb-0 number-font">{{ $balance ? $balance->amount : 0 }}</h2>
          </div>
          <div class="ms-auto">
            <div class="chart-wrapper mt-1">
              <canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
            </div>
          </div>
        </div>
        {{-- <span class="text-muted fs-12"><span class="text-secondary"><i
              class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
          Last week</span> --}}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-sm-12">
    <div class="card">
      <div class="card-body quick">
        <h3 class="card-title mb-0 fw-bold">Quick Actions</h3>
        <div  class="owl-carousel mb-0" >
            @if ($setting->tuition_payment == 1)
              <div class="card  overflow-hidden" style="height:25vh;">
                  <div class="card-body">
                      <a href="{{ route('pay_school_fee-page') }}">
                          <div class="d-flex align-items-center">
                            <div class="mt-2">
                                <h2 class="fs-5 number-font">Tuition Payment</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                  <svg xmlns="http://www.w3.org/2000/svg"style="fill:#88000B;" width="50px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                  </svg>
                                </div>
                            </div>
                          </div>
                          <span class="text-muted fs-12">
                            <span class="text-secondary  initiator-color">
                                <i class="fe fe-arrow-up-circle  text-secondary  initiator-color"></i>
                                Tuition Payment
                            </span>
                          </span>
                      </a>
                  </div>
              </div>
            @endif  
            @if ($setting->visa == 1)
              <div class="card  overflow-hidden" style="height:25vh;">
                  <div class="card-body">
                    <a href="{{ route('visa-page') }}">
                        <div class="d-flex align-items-center">
                          <div class="mt-2">
                              <h2 class="number-font fs-5">Visa <br> Fee</h2>
                          </div>
                          <div class="ms-auto">
                              <div class="chart-wrapper mt-1">
                                <svg height="50px"  style="enable-background:new 0 0 512 512;fill:#88000B;" version="1.1" viewBox="0 0 512 512" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="形状_1_3_" style="enable-background:new    ;">
                                    <g id="形状_1">
                                      <g>
                                          <path d="M211.328,184.445l-23.465,144.208h37.542l23.468-144.208     H211.328z M156.276,184.445l-35.794,99.185l-4.234-21.358l0.003,0.007l-0.933-4.787c-4.332-9.336-14.365-27.08-33.31-42.223     c-5.601-4.476-11.247-8.296-16.705-11.559l32.531,124.943h39.116l59.733-144.208H156.276z M302.797,224.48     c0-16.304,36.563-14.209,52.629-5.356l5.357-30.972c0,0-16.534-6.288-33.768-6.288c-18.632,0-62.875,8.148-62.875,47.739     c0,37.26,51.928,37.723,51.928,57.285c0,19.562-46.574,16.066-61.944,3.726l-5.586,32.373c0,0,16.763,8.148,42.382,8.148     c25.616,0,64.272-13.271,64.272-49.37C355.192,244.272,302.797,240.78,302.797,224.48z M455.997,184.445h-30.185     c-13.938,0-17.332,10.747-17.332,10.747l-55.988,133.461h39.131l7.828-21.419h47.728l4.403,21.419h34.472L455.997,184.445z      M410.27,277.641l19.728-53.966l11.098,53.966H410.27z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#88000B;"/></g>
                                      </g>
                                    </g>
                                    <g id="形状_1_2_" style="enable-background:new    ;">
                                      <g id="形状_1_1_"><g><path d="M104.132,198.022c0,0-1.554-13.015-18.144-13.015H25.715     l-0.706,2.446c0,0,28.972,5.906,56.767,28.033c26.562,21.148,35.227,47.51,35.227,47.51L104.132,198.022z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#F6AC1D;"/></g>
                                </g></g></svg>
                              </div>
                          </div>
                      </div>
                      <span class="text-muted fs-12">
                        <span class="text-secondary  initiator-color">
                            <i class="fe fe-arrow-up-circle  text-secondary  initiator-color"></i>
                            Visa Fee
                          </span>
                        </span>
                    </a>
                  </div>
              </div>
            @endif  
            @if ($setting->flight_booking == '1')
              <div class="card  overflow-hidden" style="height:25vh;">
                  <div class="card-body">
                    <a href="{{ route('flight-page') }}">
                        <div class="d-flex align-items-center">
                          <div class="mt-2">
                                <h2 class="fs-5 number-font">Flight Bookings</h2>
                          </div>
                          <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="fill:#88000B;" width="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                </svg>
                                </div>
                          </div>
                        </div>
                        <span class="text-muted fs-12">
                              <span class="text-secondary  initiator-color">
                              <i class="fe fe-arrow-up-circle  text-secondary  initiator-color"></i>
                              Flight Bookings
                              </span>
                        </span>
                    </a>
                  </div>
              </div>
            @endif    
            @if ($setting->corporate_service == '1')
              <div class="card  overflow-hidden" style="height:25vh;">
                  <div class="card-body">
                        <a href="/dashboard/corporate/service">
                          <div class="d-flex align-items-center">
                              <div class="mt-2">
                                  <h2 class="fs-5 number-font">Cooperate Service</h2>
                              </div>
                              <div class="ms-auto">
                                  <div class="chart-wrapper mt-1">
                                    <svg viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg">
                                      <g id="Cloud_data_backup" style="fill:#88000B;">
                                          <path d="M136.2976,133.8479a6.5,6.5,0,0,0,.0171-13l-.375-.001A66.6944,66.6944,0,0,0,69.2468,188.051a6.5,6.5,0,0,0,6.499,6.4522h.0489a6.5,6.5,0,0,0,6.4521-6.5479,53.6941,53.6941,0,0,1,53.6753-54.1084l.3574.001Z"/>
                                          <path d="M144.9189,285.1274a21.9137,21.9137,0,0,0,38.709,0H328.22a21.9133,21.9133,0,0,0,38.7085,0h16.0535c54.4868,0,99.14-43.8027,99.54-97.6435A98.3892,98.3892,0,0,0,384.136,88.3511H383.78a28.8313,28.8313,0,0,1-26.08-16.6084,108.27,108.27,0,0,0-196.3887,0,28.8369,28.8369,0,0,1-26.0982,16.6084h-.3383A98.3893,98.3893,0,0,0,36.488,187.4839c.4,53.8408,45.0527,97.6435,99.54,97.6435Zm19.3543-1.3632a8.9253,8.9253,0,1,1,8.9258-8.9248A8.9353,8.9353,0,0,1,164.2732,283.7642Zm161.5613-11.6368H186.0139a21.9738,21.9738,0,0,0-14.8926-18.1128V210.6538A14.56,14.56,0,0,1,185.6648,196.11h140.67a14.56,14.56,0,0,1,14.5439,14.5439v43.3091A21.9742,21.9742,0,0,0,325.8345,272.1274Zm21.74,11.6368a8.9253,8.9253,0,1,1,8.9253-8.9248A8.9354,8.9354,0,0,1,347.5744,283.7642ZM49.488,187.3882a85.388,85.388,0,0,1,85.3858-86.0371h.3564a41.8706,41.8706,0,0,0,37.8682-24.128,95.27,95.27,0,0,1,172.8125,0,41.86,41.86,0,0,0,37.8506,24.128h.3745a85.388,85.388,0,0,1,85.3857,86.0371c-.3467,46.7256-39.168,84.7392-86.54,84.7392H369.3139a21.9719,21.9719,0,0,0-15.4353-18.2859V210.6538A27.5751,27.5751,0,0,0,326.3347,183.11H262.5V146.6343a30.062,30.062,0,1,0-13,0V183.11H185.6648a27.5751,27.5751,0,0,0-27.5435,27.5439v43.1445a21.9709,21.9709,0,0,0-15.5874,18.3291h-6.5063C88.656,272.1274,49.8347,234.1138,49.488,187.3882Z"/>
                                          <path d="M102.1134,392.2954h41.1425a6.5,6.5,0,0,0,0-13H102.1134a6.5,6.5,0,0,0,0,13Z"/>
                                          <path d="M102.1134,416.3252h41.1425a6.5,6.5,0,0,0,0-13H102.1134a6.5,6.5,0,0,0,0,13Z"/>
                                          <path d="M95.6134,433.855a6.5,6.5,0,0,0,6.5,6.5h25.082a6.5,6.5,0,1,0,0-13h-65.082A6.5,6.5,0,0,0,95.6134,433.855Z"/>
                                          <path d="M318.4806,409.0161a6.5,6.5,0,0,0,6.5,6.5h23.4008a6.5,6.5,0,0,0,0-13H324.9806A6.5,6.5,0,0,0,318.4806,409.0161Z"/>
                                          <path d="M388.3814,427.355H324.9806a6.5,6.5,0,0,0,0,13h23.4008a6.5,6.5,0,0,0,0-13Z"/>
                                          <path d="M442.9644,336.4331H405.8287l-24.1543-24.1543a6.4783,6.4783,0,0,0-4.5957-1.8889v-.0154h-70.88A14.636,14.636,0,0,0,291.58,324.9936v72.1846H235.68V351.0054a14.5888,14.5888,0,0,0-14.5723-14.5723H183.9727l-24.1543-24.1543a6.48,6.48,0,0,0-4.601-1.8889v-.0154H84.3424a14.636,14.636,0,0,0-14.6192,14.6191v133.32a14.636,14.636,0,0,0,14.6192,14.6191H100.295v14.4756a14.5889,14.5889,0,0,0,14.5723,14.5723H221.108A14.5889,14.5889,0,0,0,235.68,487.4087v-77.23H291.58V458.314a14.636,14.636,0,0,0,14.6191,14.6191H322.151v14.4756a14.5888,14.5888,0,0,0,14.5722,14.5723H442.9644a14.5889,14.5889,0,0,0,14.5723-14.5723V351.0054A14.5888,14.5888,0,0,0,442.9644,336.4331Zm-281.2421-3.8662,21.1943,21.1943H161.7223ZM192.109,458.314a1.6213,1.6213,0,0,1-1.6192,1.6191H84.3424a1.6213,1.6213,0,0,1-1.6192-1.6191v-133.32a1.6213,1.6213,0,0,1,1.6192-1.6191h24.38v36.8867a6.5,6.5,0,0,0,6.5,6.5H192.109ZM383.5782,332.5669l21.1943,21.1943H383.5782ZM413.9649,458.314a1.6212,1.6212,0,0,1-1.6191,1.6191H306.1988a1.6212,1.6212,0,0,1-1.6191-1.6191v-133.32a1.6212,1.6212,0,0,1,1.6191-1.6191h24.3794v36.8867a6.5,6.5,0,0,0,6.5,6.5h36.8867Z"/>
                                      </g>
                                    </svg>
                                  </div>
                              </div>
                          </div>
                          <span class="text-muted fs-12">
                              <span class="text-secondary  initiator-color">
                                <i class="fe fe-arrow-up-circle  text-secondary  initiator-color"></i>
                                Cooperate Service
                              </span>
                          </span>
                        </a>
                  </div>
              </div>
            @endif  
            @if ($setting->merchandise_payment == 1)
              <div class="card  overflow-hidden" style="height:25vh;">
                  <div class="card-body">
                    <a href="/dashboard/merchandise">
                        <div class="d-flex align-items-center">
                          <div class="mt-2">
                                <h2 class="fs-5 number-font">Merchandise Payment</h2>
                          </div>
                          <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" style="fill:#88000B;" width="50" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008h2V10.5z" />
                                </svg>
                                </div>
                          </div>
                        </div>
                        <span class="text-muted fs-12">
                          <span class="text-secondary  initiator-color">
                              <i class="fe fe-arrow-up-circle  text-secondary  initiator-color"></i>
                              Merchandise Payment
                          </span>
                        </span>
                    </a>
                  </div>
              </div>
            @endif
            @if ($setting->other_service == 1)
              <div class="card  overflow-hidden" style="height:25vh;">
                  <div class="card-body">
                      <a href="/dashboard/others/services">
                          <div class="d-flex align-items-center">
                              <div class="mt-2">
                                <h2 class="fs-5 number-font">Other Services</h2>
                              </div>
                              <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="fill:#88000B;" width="50" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h2.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                                    </svg>
                                </div>
                              </div>
                          </div>
                          <span class="text-muted fs-12">
                              <span class="text-secondary  initiator-color">
                                <i class="fe fe-arrow-up-circle text-secondary  initiator-color"></i> 
                                Other Services
                              </span>
                          </span>
                      </a>
                  </div>
              </div>
            @endif  
      </div>
      </div>
    </div>
  </div>    
</div>


<!-- approved kyc -->
@if ($user->kyc && $user->kyc->kyc_status == 'APPROVED' && !session('modal_shown'))
<div class="modal fade" id="modaldemo4">
  <div class="modal-dialog modal-sm modal-dialog-centered text-center " role="document">
      <div class="modal-content tx-size-sm">
          <div class="modal-body text-center p-4 pb-5">
              <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
              <h4 class="text-success tx-semibold">Congratulations!</h4>
              <p class="mg-b-20 mg-x-20">Your kyc as been approved.</p>
          </div>
      </div>
  </div>
</div>
@endif


@endsection

@push('scripts')
<script type="text/javascript">
 $(document).ready(function() {
  if ($('#modaldemo4').length > 0 && !sessionStorage.getItem('modal_shown')) {
      $('#modaldemo4').modal('show');
      sessionStorage.setItem('modal_shown', true);
    }
    setTimeout(function() {
      $('#modaldemo4').modal('hide');
    }, 2000);
  });
</script>
    <script>
      $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:3
              }
          }
      })
    </script>
@endpush