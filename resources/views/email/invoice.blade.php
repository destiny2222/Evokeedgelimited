<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            font-family: sans-serif;
            font-style: normal;
            font-weight: normal;
            line-height: 15px;
            color: #828282;
            background-color: #F2F2F2;
        }

        

        .container {
           /* max-width: 600px; */
            margin: auto;
            background: #F2F2F2;
            table-layout: fixed;
            padding: 20px;
        }

        .wrapper-inner { 
            background-color: #fff;
            Margin: 0 auto;
            padding: 15px;
            border-collapse: collapse;
            table-layout: fixed;
            max-width: 500px;
        }

        table {
            border-spacing: 0;
            font-family: sans-serif;
            color: #727f80;
        }



        .primary {
            color: #6450EF;
        }

        .success {
            color: #008000;
        }

        .danger {
            color: #ff0000;
        }

        .fw-bold {
            font-weight: bold;
        }

        .table-footer {
            text-align: center;
        }

        .table-footer p {
            line-height: 11px;
        }


        /*--- End Outer Table 1 --*/
        .main-table-first {
            width: 100%;
            max-width: 610px;
            Margin: 0 auto;
        }

        /*--- Start Two Column Sections --*/
        .two-column {
            font-size: 0;
            padding: 5px 0 10px 0;
            display: flex;
            justify-content: space-between;
        }


        .two-column .content-inner {
            font-size: 16px;
            line-height: 20px;
            text-align: justify;
        }

        .content-inner {
            width: 100%;
        }

        img {
            border: 0;
        }

        .layout div {
            padding-top: 0.1rem;
            text-align: left;
            vertical-align: top;
            color: #60666d;
            font-size: 15px;
            line-height: 21px;
            font-family: sans-serif;
            font-weight: 400;
            width: 476px;
        }

         a{
            padding-top:150px;
         }

         .d-flex{
            display: flex;
         }

         .justify-content-between{
            justify-content: space-between;
         }

         .reciept{
            font-weight: 900;
            color: #000000;
         }

         .btn-primary{
            background-color: #6450EF;
            padding: 10px;
            text-decoration: none;
            color: #fff;
         }
         .table-responsive tr td{
            padding: 10px ;
         }

         .table-responsive table {
            width: 100%;
            border: 1px solid blue;
            }

            .scroll-container {
                overflow: auto;
                
              }
              
              .scroll {
                margin: 0;
              }

              .scroll tr td{
                padding: 10px;
              }

              .logo{
                width: 180;
                text-align: right;
              }
        /*--- Media Queries --*/
        @media screen and (max-width:768px) {

            .two-column .section-inner {
                width: 100% !important;
                max-width: 100% !important;
                display: inline-block;
                vertical-align: top;
            }
            .wrapper-inner {
                max-width: 670px;
            }

            .layout div{
                width: 285px;
            }
            .table-footer p {
                line-height: 25px;
                inline-size: 200px;
            }

            .container{
                padding: 0px;
            }
            .d-flex{
                
            }
            .reciept-div{
                padding-bottom: 30px;
            }
            .logo{
                width: 100px;
            }
        }

        @media screen and (max-width: 400px) {
            .h1 {
                font-size: 22px;
            }

            .two-column .column {
                max-width: 100% !important;
            }

            .wrapper-inner {
                max-width: 670px;
            }

            .layout div{
                width: 285px;
            }
            .table-footer p {
                line-height: 25px;
                inline-size: 200px;
            }
        }

        @media screen and (min-width: 401px) and (max-width: 400px) {

            .two-column .column {
                max-width: 50% !important;
            }


        }

    </style>
</head>

<body>
    <div class="container">
        <div class="wrapper-inner">
            @if ($order->done == "completed" )
                <table>
                    <tr >
                        <td >
                            <div class="d-flex justify-content-between" style="padding-bottom: 10%;" width="100%">
                                <div class="reciept-div">
                                    <h3 class="reciept">Reciept</h3>
                                </div>
                                <div style="text-align:right">
                                    <figure style="margin:10px 0 0;padding-bottom:25px;">
                                        <img src="https://evokeedgelimited.com/assets/img/black-logo.png" class="logo" alt="Logo">
                                    </figure>
                                    <p style="line-height: 20px;text-align:right">
                                        8465 Keystone Crossing, <br> Suite 115 #1149, <br> Indianapolis, <br> Indiana 46240 US.
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="two-column">

                            <div class="section" style="padding-bottom: 30%;">
                                <table width="100%">
                                    <tr>
                                        <td class="inner-td">
                                            <table class="content-inner">
                                                <tr>
                                                    <td  style="text-align:left;">
                                                        EvokeEdge LLC
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- end section  -->

                            <div class="section" style="padding-bottom: 20%;">
                                <table width="100%">
                                    <tr style="text-align: right;">
                                        <td class="inner-td">
                                            <table class="content-inner">
                                                <tr style="margin-bottom:1rem;">
                                                    <td style="text-align:right">
                                                        <strong>Invoice Date:</strong><br>
                                                        <small>01/07/2024</small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:right">
                                                        <strong>Order Number:</strong><br>
                                                        <small>01/07/2024</small>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- end section  -->
                        </td><!--- End First Column of Two Columns -->
                    </tr>
                    <tr>
                        <td  style="padding-bottom: 10%;">
                            <div class="scroll-container">
                                <table class="table scroll" border="1">
                                    <thead>
                                        <tr>
                                            <td class=""><strong>Package Item</strong></td>
                                            <td class=""><strong>Total Price</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum, distinctio!</td>
                                            <td class="">$150</td>
                                        </tr>
                                        <!-- <tr>
                                            <td style="text-align: right;padding-top:2rem ;">
                                                Total: $40
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>    
                        </td>
                    </tr>
                </table><!-- main section end -->
            @else
                <table>
                    <tr>
                        <td>
                            <table width="100%">
                                <tr>
                                    <td style="text-align:center; padding-top: 10px; padding-bottom:25px;">
                                        <a href=""><img src="https://evokeedgelimited.com/assets/img/black-logo.png" width="180" alt="Logo"></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 1.5rem; color: #13161D; font-size: 15px;line-height:50px;">
                            <div style="font-weight: bold;">Hi, {{ $order->user->name }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="layout">
                            <div>Thank you for submitting your documents.</div>
                        </td>
                    </tr>
                    <tr>
                        @if ($order->done == 'pending')
                        <td class="layout">
                            <div>
                                Your details is pending.
                            </div>
                        </td>
                        @elseif($order->done == 'processing')
                        <td class="layout">
                            <div>Your details  is been processing.</div>
                        </td>
                        @elseif($order->done == 'delined')
                        <td class="layout">
                            <div>
                                Your details has been declined.   <br>
                                <span>Please log in to your account to re-submit your Details.</span>
                            </div>
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" style="border-spacing: 0; padding-top:2rem;">
                                <tr>
                                    <td class="layout">
                                        <div style="padding-bottom:7px;">If you have any questions, feel free to reach out
                                            to us.</div>
                                        <a href="#">support@evokeedgellc.com</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table><!-- main section end -->

            @endif    
        </div>
    </div>
</body>

</html>