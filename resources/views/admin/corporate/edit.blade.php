
<div class="modal fade" id="exampleModal{{ $corporates->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit ') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.corporate-service-update', $corporates->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Name') }}</label>
                             <input type="text" name="name" class="form-control" value="{{ $corporates->name }}">                        
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Bank Name') }}</label>
                             <input type="text" name="bank_name" class="form-control" value="{{ $corporates->bank_name }}">                        
                            @error('bank_name')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Bank Address') }}</label>
                             <input type="text" name="bank_address" class="form-control" value="{{ $corporates->bank_address }}">                        
                            @error('bank_address')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Bank Account Number') }}</label>
                             <input type="number" name="bank_account_number" class="form-control" value="{{ $corporates->bank_account_number }}">                        
                            @error('bank_account_number')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Swift Code') }}</label>
                             <input type="number" name="bank_swift_code" class="form-control" value="{{ $corporates->bank_swift_code }}">                        
                            @error('bank_swift_code')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Amount') }}</label>
                             <input type="number" name="amount" class="form-control" value="{{ $corporates->amount }}">                        
                            @error('amount')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
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

