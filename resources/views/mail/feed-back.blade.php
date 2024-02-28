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

        .logo {
            border: 0.5px solid #BDBDBD;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #F2F2F2;
            table-layout: fixed;
            padding: 20px;

        }

        .wrapper-inner {
            background-color: #fff;
            max-width: 670px;
            Margin: 0 auto;
            padding: 15px;
            border-collapse: collapse;
            table-layout: fixed;
            word-break: break-word;
            width: 476px;
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

        a {
            padding-top: 150px;
        }

        /*--- Media Queries --*/
        @media screen and (max-width:768px) {

            .two-column .section-inner {
                width: 100% !important;
                max-width: 100% !important;
                display: inline-block;
                vertical-align: top;
            }

            .layout div{
                width: 400px;
            }

        }

        @media screen and (max-width: 400px) {
            .h1 {
                font-size: 22px;
            }

            .layout div{
                width: 400px;
            }

            .two-column .column {
                max-width: 100% !important;
            }

        }

        @media screen and (min-width: 401px) and (max-width: 400px) {

            .two-column .column {
                max-width: 50% !important;
            }

            .layout div{
                width: 400px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="wrapper-inner">
            <table>
                <tr>
                    <td style="padding-top: 1.5rem; color: #13161D; font-size: 15px;line-height:50px;">
                        <div style="font-weight: bold;">{{ $feedback->name }}</div>
                    </td>
                </tr>
                <tr>
                    <td class="layout">
                        <div>{{ $feedback->email }}</div>
                    </td>
                </tr>
                <tr>
                    <td class="layout">
                        <div>{{ $feedback->message }}</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0; padding-top:2rem;">
                            <tr>
                                <td style="text-align:center; padding-top: 10px; padding-bottom:25px;">
                                    <a href=""><img src="https://evokeedgelimited.com/assets/img/black-logo.png" width="180" alt="Logo"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            {{-- <tr>
                                <td class="layout">
                                    <div class="layout-div" style="padding-bottom:7px;">If you have any questions, feel free to reach out
                                        to us.</div>
                                    <a href="#">support@evokeedgellc.com</a>
                                </td>
                            </tr> --}}
                            <tr>
                                <td>
                                    <div style="text-align: center">
                                        8465 Keystone Crossing,  suite 115, <br> Indianapolis, IN,  USA.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table><!-- main section end -->
        </div>
    </div>
</body>

</html>