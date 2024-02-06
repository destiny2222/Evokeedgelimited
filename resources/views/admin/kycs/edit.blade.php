@extends('layout.master-2')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Grid Card -->
        <div class="row py-3">
            <div class="col-xl">
                <h6 class="pb-1 mb-4 text-muted">Approve User</h6>
            </div>
        </div>
        <div class="row">
            <div class="card p-3">
                <form action="{{  route('admin.kyc.update', $kyc->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="container">
                        <input type="hidden" name="user_id" value="{{ $kyc->user->id }}">
                        <div class="row ">
                             <input class="form-control" hidden type="text" name="gender" value="{{  $kyc->gender }}">
                            
                            <div class="col-lg-12 mb-4">
                                <label for="">Marital Status</label>
                                <input type="text" name="marital_status" value="{{  $kyc->marital_status}}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Date of Birth</label>
                                <input type="date" name="date_birth" value="{{  $kyc->date_birth }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Nationality</label>
                                <input type="text" name="nationality" value="{{  $kyc->nationality }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Date sign</label>
                                <input type="date" name="data_sign" value="{{  $kyc->data_sign }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Street Address</label>
                                <input type="text" name="street_address" value="{{  $kyc->street_address }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Street Address 2</label>
                                <input type="text" name="street_address_2" value="{{  $kyc->street_address_2 }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Status</label>
                                <input type="text" name="status" value="{{  $kyc->status }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Proof of Address</label>
                                <input type="file" name="proof_of_address" id="" value="{{ $kyc->proof_of_address }}" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="">Proof of Identification</label>
                                <input type="file" name="documents" id="" value="{{ $kyc->documents }}" class="form-control">
                            </div>
                            
                            <div class="col-lg-12 mb-4">
                                <label class="form-label text-black fw-bold" for="basic-default-fullname">{{ __('Kyc Status') }}</label>
                                <select name="kyc_status" id="" class="form-control">
                                    <option value="PROCESSING" {{ $kyc->kyc_status == 'PROCESSING' ? 'selected' : '' }}>PROCESSING</option>
                                    <option value="RESUBMIT" {{ $kyc->kyc_status == 'RESUBMIT' ? 'selected' : '' }}>RESUBMIT</option>
                                    <option value="DECLINED" {{ $kyc->kyc_status == 'DECLINED' ? 'selected' : '' }}>DECLINED</option>
                                    <option value="APPROVED" {{ $kyc->kyc_status == 'APPROVED' ? 'selected' : '' }}>APPROVED</option>
                                </select>
                            </div>                            
                            <input class="form-check-input" hidden  name="approve_status" type="checkbox" id="flexSwitchCheckChecked"   {{ old('approve_status', $kyc->approve_status) ? 'checked' : '' }}/>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary w-100 btn-lg">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
