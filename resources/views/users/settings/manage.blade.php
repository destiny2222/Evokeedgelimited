@extends('layout.master')
@section('content')
@section('page-title', 'Transaction')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->
    <!-- ROW-5 -->
<div class="row">
  <div class="col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mb-0">Recent transactions  </h3>
      </div>
      <div class="card-body pt-4">
        <div class="grid-margin">
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-body tabs-menu-body border-0 pt-0">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab5">
                    <div class="table-responsive">
                      <table id="example" class="table table-bordered text-nowrap mb-0">
                        <thead class="border-top">
                          <tr>
                            <th class="bg-transparent border-bottom-0" style="width: 5%;">S/N</th>
                            <th class="bg-transparent border-bottom-0">
                              Date</th>
                            <th class="bg-transparent border-bottom-0">
                              TRANSACTIONS ID/REFERENCE
                            </th>
                            <th class="bg-transparent border-bottom-0">
                              PURPOSE OF PAYMENT	
                            </th>
                            <th class="bg-transparent border-bottom-0">
                              AMOUNT
                            </th>
                            {{-- <th class="bg-transparent border-bottom-0">
                              Payment Mode</th> --}}
                            <th class="bg-transparent border-bottom-0" style="width: 10%;">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($transactions) != 0)
                            @foreach ($transactions as $transaction)
                              <tr class="border-bottom">
                                <td class="text-center">
                                  <div class="mt-0 mt-sm-2 d-block">
                                    <h6 class="mb-0 fs-14 fw-semibold">{{ $loop->index + 1 }}</h6>
                                  </div>
                                </td>
                                <td>
                                  <span class="mt-sm-2 d-block">{{ $transaction['date'] }}</span>
                                </td>
                                <td>
                                  <div class="d-flex">
                                    <div class="mt-0 mt-sm-3 d-block">
                                      <h6 class="mb-0 fs-14 fw-semibold">{{ $transaction['reference'] }}</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="d-flex">
                                    <div class="mt-0 mt-sm-3 d-block">
                                      <h6 class="mb-0 fs-14 fw-semibold">{{ $transaction['type'] }}</h6>
                                    </div>
                                  </div>
                                </td>
                                <td><span class="fw-semibold mt-sm-2 d-block">{{ $transaction['amount'] }}</span></td>
                                <td>
                                  @if ($transaction['done'] == 'completed')
                                    <span class="badge bg-success-transparent  text-success p-2 px-3">Completed</span>
                                  @elseif ($transaction['done'] == 'processing')
                                    <span class="badge bg-warning-transparent  text-warning p-2 px-3">Processing</span>
                                  @else
                                    <div class="mt-sm-1 d-block">
                                      <span class="badge bg-danger-transparent  text-danger p-2 px-3">Pending</span>
                                    </div>
                                  @endif
                                </td>            
                              </tr>
                              @endforeach
                            @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ROW-4 END -->
@push('scripts')
    <script>
      function applyDataTable(){
  
        $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print all'
                    },
                    {
                        extend: 'print',
                        text: 'Print current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }
                ],
                select: true
            } );
        
        
        }


    $(document).ready(function() {
        $('#trigger-update').click(function() {
            $('#example').DataTable().destroy();
            setTimeout(function() {
                applyDataTable();
            }, 2000);
        });

        applyDataTable(); 
    });
    </script>
@endpush
   
@endsection