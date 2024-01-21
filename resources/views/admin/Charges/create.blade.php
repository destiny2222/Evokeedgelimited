
<div class="modal fade" id="modalTop" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Add Charge') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.transaction-charge-store') }}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Tuition Charge Amount') }}</label>
                            <input type="text" name="tuition_charge_amount" value="{{ $charges->tuition_charge_amount }}" class="form-control @error('tuition_charge_amount') is-invalid @enderror" id="basic-default-fullname" placeholder="" />
                            @error('tuition_charge_amount')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label class="form-label" for="basic-default-company">{{  __('Visa Charge Amount') }}</label>
                            <input type="text"   name="visa_charge_amount" value="{{ $charges->visa_charge_amount }}" class="form-control  @error('visa_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                            @error('visa_charge_amount')
                            <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label class="form-label" for="basic-default-company">{{  __('Corporate Charge Amount') }}</label>
                            <input type="text"   name="corporate_charge_amount" value="{{ $charges->corporate_charge_amount }}" class="form-control  @error('corporate_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                            @error('corporate_charge_amount')
                            <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label class="form-label" for="basic-default-company">{{  __('Merchant Charge Amount') }}</label>
                            <input type="text"   name="merchant_charge_amount" value="{{ $charges->merchant_charge_amount }}" class="form-control  @error('merchant_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                            @error('merchant_charge_amount')
                            <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label class="form-label" for="basic-default-company">{{  __('OtherService Amount') }}</label>
                            <input type="text"   name="other_service" value="{{ $charges->other_service }}" class="form-control  @error('other_service') is-invalid @enderror" id="basic-default-company" placeholder="" />
                            @error('other_service')
                            <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label class="form-label" for="basic-default-company">{{  __('Flights Charge Amount') }}</label>
                            <input type="text"   name="flights_charge_amount" value="{{ $charges->flights_charge_amount }}" class="form-control  @error('flights_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                            @error('flights_charge_amount')
                            <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0 text-center">
                            <input type="submit" class="btn btn-primary btn-lg" value="Save Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('layouts.script') --}}