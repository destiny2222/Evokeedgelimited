<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OtherService Notification</title>
    <style>
        * {
            font-family:Georgia, 'Times New Roman', Times, serif;
        }

        body {
            font-family:Georgia, 'Times New Roman', Times, serif;
            font-style: normal;
            font-weight: normal;
            line-height: 15px;
            color: #828282
        }

        .logo {
            border: 0.5px solid #BDBDBD;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            table-layout: fixed;
            padding: 20px;
        }

        .wrapper-inner {
            width: 100%;
            background-color: #fff;
            max-width: 670px;
            Margin: 0 auto;
        }

        table {
            border-spacing: 0;
            font-family: sans-serif;
            color: #727f80;
        }

        .verify-btn {
            background: #F2F2F2;
            border-radius: 50px;
            border: 1px solid #F2F2F2;
            padding: 10px 40px;
            Margin-top: 1rem;
        }

        .verify-btn {
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 27px;
            color: #333333;
        }

        .verify-btn-submit {
            background: #F7CC5A;
            border-radius: 5px;
            padding: 20px 5rem;
            border: 1px solid #F7CC5A;
            Margin-top: 3rem;
        }

        button[type=submit] {
            font-family: GT Walsheim Pro;
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            line-height: 15px;
            color: #13161D;
        }

        .primary {
            color: #6450EF;
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
        }

        .two-column .section {
            width: 100%;
            max-width: 240px;
            ;
            display: inline-block;
            vertical-align: top;
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

        #callout {
            float: right;
            /* Margin:6% 5% 2% 0; */
            Margin: 6% -47% 2% 0;
            height: auto;
            overflow: hidden;
        }

        #callout img {
            max-width: 20px;
        }

        .social {
            list-style-type: none;
            Margin-top: 1%;
            padding: 0;
        }

        .social li {
            display: inline-block;
            text-align: end;
        }

        .social li img {
            max-width: 15px;
            Margin-bottom: 0;
            padding-bottom: 0;
            padding-left: 20px;
        }

        /*--- Start Outer Table Banner Image, Text & Button --*/



        a {
            text-decoration: none;
            color: #0000ff;
            font-size: 15px;
        }

        /*--- Media Queries --*/
        @media screen and (max-width:768px) {
            #callout {
                float: none !important;
                margin: 0% 0% 0% 0;
                height: auto;
                text-align: center;
                overflow: hidden;
            }

            #callout img {
                max-width: 26px !important;
            }

            .two-column .section-inner {
                width: 100% !important;
                max-width: 100% !important;
                display: inline-block;
                vertical-align: top;
            }



        }

        @media screen and (max-width: 400px) {
            .h1 {
                font-size: 22px;
            }

            .two-column .column {
                max-width: 100% !important;
            }


        }

        @media screen and (min-width: 401px) and (max-width: 400px) {

            .two-column .column {
                max-width: 50% !important;
            }

        }

        .box{
            box-shadow: 0 2px 2px rgb(0 0 0 / 0.2);
            /* min-height: 200px; */
            /* width: 55w; */
            padding: 20px;
            margin: 10px auto;
            background: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper-inner">
            <table class="box">
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td
                                    style="text-align:center; padding-top: 10px; padding-bottom:25px; border-bottom:1.6px solid #828282;">
                                    <a href="https://evokeedgelimited.com/">
                                        <img src="https://evokeedgelimited.com/assets/img/black-logo.png" style="width: 129px; height: auto; max-width: 200px;" />
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td
                        style="padding-top: 1.5rem; color: #13161D; font-size: 12px;line-height: 14px; font-weight: bold;">
                        <h2>Hello mr/mrs EvokeEdge LLC,</h2>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0.5rem; color:#828282; font-style:normal;font-weight:400;font-size: 22px; line-height: 30px;">
                        <p>
                            A user has interacted with the Otherservice.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0.5rem; color: #13161D; font-size: 14px;line-height: 14px; font-weight: bold;">
                        <h3>User: {{ $users->name }}</h3>
                    </td>
                </tr>
                <tr>
                    <td style="margin:auto 60%; background:#19006D; padding:10px 100px;">
                        <a href="{{ url('https://www.evokeedgelimited.com/admin') }}" style="color:#fff;">Visit Our Website</a>
                    </td>
                </tr>
            </table><!-- main section end -->
        </div>
    </div>
</body>
</html>
