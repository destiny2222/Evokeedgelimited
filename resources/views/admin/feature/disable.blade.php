<!-- Modal -->
<div class="modal fade" id="modalTop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Disable/Enable Services</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{  route('admin.update-features')  }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-check form-switch mb-2"> 
                    <input class="form-check-input" type="checkbox" name="visa" role="switch" id="switched-visa"  {{ $setting->visa ? 'checked' : '' }}> 
                    <label class="form-check-label" for="switched-visa">Visa Fee</label>
                </div> 
                </div>
                <div class="form-check form-switch mb-2"> 
                    <input class="form-check-input" type="checkbox" role="switch" name="flight_booking" id="switch-flight" {{  $setting->flight_booking ? 'checked' : '' }}> 
                    <label class="form-check-label" for="switch-flight">Flight Booking</label> 
                </div>
                <div class="form-check form-switch mb-2"> 
                    <input class="form-check-input" type="checkbox" role="switch" name="tuition_payment" id="switch-tuition" {{  $setting->tuition_payment ? 'checked' : '' }}> 
                    <label class="form-check-label" for="switch-tuition">Tuition Payment</label> 
                </div>
                <div class="form-check form-switch mb-2"> 
                    <input class="form-check-input" type="checkbox" role="switch" name="corporate_service" id="switch-corporate" {{  $setting->corporate_service ? 'checked' : '' }}> 
                    <label class="form-check-label" for="switch-corporate">Corporate Service</label> 
                </div>
                <div class="form-check form-switch mb-2"> 
                    <input class="form-check-input" type="checkbox" role="switch" name="merchandise_payment" id="switch-merchandise" {{  $setting->merchandise_payment ? 'checked' : '' }}> 
                    <label class="form-check-label" for="switch-merchandise">Merchandise Payment</label> 
                </div>
                <div class="form-check form-switch mb-2"> 
                    <input class="form-check-input" type="checkbox" role="switch" name="other_service" id="switch-other" {{  $setting->other_service ? 'checked' : '' }}> 
                    <label class="form-check-label" for="switch-other">other_service</label> 
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>