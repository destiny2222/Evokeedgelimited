<!-- Modal -->
<div class="modal fade" id="modalTop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Baggage</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{  route('admin.update-baggage')  }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-check form-switch mb-2"> 
                    <label class="form-check-label" for="switched-visa">Number Baggage</label>
                    <input class="form-control" type="number" name="baggage"  id="switched-visa" value="{{ $baggage->baggage}}"> 
                </div>
                <div class="mb-3">
                    <input type="submit" value="Submit" class="form-control btn btn-primary">
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>