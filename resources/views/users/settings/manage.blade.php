@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <h1 class="np-text-title-screen m-b-2" style="color:blue">Transaction History</h1>  
            </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body shadow-lg">
              <div class="table-responsive">
                <table class="table table-flush manage">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Date</th>
                      <th>Transactions ID/reference</th>
                      <th>Purpose of payment</th>
                      <th>Amount</th>
                      <th>Transactions status </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($transactions) != 0)
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td style="font-size: 11px"><b>{{ $transaction['date'] }}</b></td>
                            <td>{{ $transaction['reference'] }}</td>
                            <td>{{ $transaction['type'] }}</td>
                            <td>{{ $transaction['amount'] }}</td>
                            <td>
                                @if ($transaction['done'] == 'completed')
                                   <span class="badge  bg-success">Completed</span>
                                @elseif ($transaction['done'] == 'processing')
                                  <span class="badge bg-warning">Processing</span>
                                @else
                                  <span class="badge  bg-danger">Pending</span>
                                @endif
                        </tr>
                    @endforeach
                @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          {{ $tuitionpayment->links() }}
          {{ $tuitionpaymentwire->links() }}
        </div> --}}
    </div>
@endsection