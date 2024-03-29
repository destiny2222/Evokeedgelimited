<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tranaction Notification</title>
  <style>

      body{
        background-color: #EFF1FF;
      }

      .warpper{
         margin:0 auto;
         max-width:500px;
      }

      .warpper .content .card{
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 100%;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: 0.25rem;
      }

      .warpper .content .card .card-header {
        padding: 0.5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(225,225,225,.03);
        border-bottom: 1px solid rgba(0,0,0,.125);
        text-align: center;
        border-top:2px solid #050482;
    }

    .warpper .content .card .card-body{
        flex: 1 1 auto;
        padding: 1rem 1rem;
        background-color: #000;
        color: #fff;
    }
.footer-copyright{
    font-size: 0.80em;
    font-weight: 400;
    font-family:  Arial, sans-serif;
    text-align: center;
}

.card .card-body p{
    font-size: 1em;
    font-family:  Arial, sans-serif;
    font-weight: 300;
    line-height: 30px;
}
    
  </style>
</head>
<body>
    <div class="warpper" style="padding-top:40px;">
        <table>
            <tr class="table-tr">
                <td class="content">
                    <div class="card">
                        <div class="card-header">
                            <img src="/public/assets/img/black-logo.png" width="100" alt="Logo">
                        </div>
                        <div class="card-body">
                            <h4>Hi, {{ $wallet->user->name  }}</h4>
                            <p>
                                @if ($wallet)
                                    @php
                                        $latestTransaction = $wallet->transactions()->latest()->first();
                                        $latestTransactionCharge = $latestTransaction->charge;
                                        // if ($latestTransaction) {
                                        //     $latestTransactionCharge
                                        // } else {
                                        //     dd("No transactions found for the user wallet.");
                                        // }
                                    @endphp
                                    ${{ $latestTransactionCharge  }}  
                                @else
                                    
                                @endif
                                has been deposited in your wallet. Your new balance is ${{ $wallet->amount}}

                            </p>
                        </div>
                    </div>
                </td>
                
            </tr>
            <tr>
                <td style="text-align:center;padding-top:40px;">
                    <p class="footer-copyright">  
                        &copy; <script>document.write(new Date().getFullYear())</script> {{ config('app.name')}} . All rights reserved.
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>