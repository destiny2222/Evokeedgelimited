
<div class="modal fade" id="exampleModal{{ $tuitions->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit ') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tuition-payment-complete', $tuitions->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Action') }}</label>
                            <select name="done" id="" class="form-control">
                                <option value="pending" {{ $tuitions->done == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $tuitions->done == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $tuitions->done == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>                            
                            @error('done')
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

