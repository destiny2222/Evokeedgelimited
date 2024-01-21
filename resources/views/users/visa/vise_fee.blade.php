@extends('layout.master')
@section('content')
    <div class="continer  p-t-5">
        <div class="row">
            
            <div class="row">
                <div class="col-lg-12 m-b-2">
                    <a href="{{ route('initiator-page') }}" style="text-decoration:none;">
                        <i class="bi bi-arrow-left"></i>                         
                        Go Back  
                    </a>
                </div>
                <div class="col-lg-12 col-12">
                   <div class="select_country_visa shadow-lg p-4">
                        <h3>Select country of choice.</h3>
                        <div class="form-group">
                            <select name="" id="redirectSelect" class="search-control">
                                <option value="" disabled selected>Select a country</option>
                                <option value="/dashboard/canada_visa">Canada</option>
                                <option value="/dashboard/us_visa">United States</option>
                                <option value="unitedkingdom">United Kingdom</option>
                            </select>
                        </div>        
                   </div>
                </div>
            </div>
        </div>
    </div>        

    
@endsection
@push('scripts')    
    <script>
        const redirectSelect = document.getElementById('redirectSelect');
        
        // Event listener to redirect when an option is selected
        redirectSelect.addEventListener('change', function() {
        const selectedPage = redirectSelect.value;
        if (selectedPage) {
            window.location.href = selectedPage;
        }
        });
   </script>
@endpush
  