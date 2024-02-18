
<div class="modal fade" id="exampleModal{{ $otherservices->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit ') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.otherservices-complete', $otherservices->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Action') }}</label>
                            <select name="done" id="" class="form-control">
                                <option value="3" {{ $otherservices->done == 3 ? 'selected' : '' }}>Completed</option>
                                <option value="2" {{ $otherservices->done == 2 ? 'selected' : '' }}>Processing</option>
                                <option value="1" {{ $otherservices->done == 1 ? 'selected' : '' }}>Declined</option>
                                <option value="0" {{ $otherservices->done == 0 ? 'selected' : '' }}>Pending</option>
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

