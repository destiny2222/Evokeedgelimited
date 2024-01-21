
<div class="modal fade" id="modalTop{{ $transactions->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit ') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.transaction.update', $transactions->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('User Name') }}</label>
                            <select name="user_id" id="" class="form-control">
                                {{-- @foreach($user as $users) --}}
                                    <option value="{{ $transactions->user_id }}">{{ $transactions->user->lastname }}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Amount') }}</label>
                            <input type="text" value="{{ old('amount', $transactions->amount) }}" name="amount" class="form-control @error('amount') is-invalid @enderror" id="basic-default-fullname" />
                            @error('amount')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Approve or Declined') }}</label>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked"   {{ old('status', $transactions->status) ? 'checked' : '' }}/>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0 text-center">
                            <input type="submit" class="btn btn-primary btn-sm" value="Save Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
