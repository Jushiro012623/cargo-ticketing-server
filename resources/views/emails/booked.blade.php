<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Game of Thrones</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!-- START CSS STYLES - These should be inline before sending! -->
    <style>
        /* RESET */
        img,
        img a {
            border: none;
            max-width: 100%;
            outline: none;
            /* Fix resized images in IE */
            -ms-interpolation-mode: bicubic;
        }

        body {
            background-color: #fff;
            font-family: "Roboto", sans-serif;
            font-size: 1rem;
            /* 16px */
            /* 24px */
            margin: 0;
            padding: 0;
            /* Render fonts consistently */
            -webkit-font-smoothing: antialiased;
            /* Fix text resizing on mobile */
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        hr {
            border: 0;
            border-bottom: 1px solid rgba(66, 66, 66, .2);
            margin: 1.25rem 0;
        }

        table {;
            border: none;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            /* Remove Outlook's added spacing on tables */
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        table td {
            font-family: "Roboto", sans-serif;
            font-size: 1rem;
            vertical-align: top;
        }
        .main{
            max-width: 700px;
            margin:4rem auto 0 auto ;
            background: #eaeaea;
            padding: 3rem 4rem;
            border-radius: 2rem;
        }
        .welcome {
            font-size: 1.2rem;
        }
        .summary-body {
            text-transform: capitalize;
            background: #FFFFFF;
            padding: 1rem 3rem;
            color: #2d2d2d;
            border-radius: 2rem;
        }
        .summary-title{
            font-size: 14px;
            color: #696969;
        }
        .summary-text {
            font-size: 12px;
        }
        .fares{
            border-bottom: 1px #2d2d2d solid;
        }
        .right{
            text-align: right;
            font-weight: 600;
        }
        .summary-type{
            margin-bottom: 2rem;
        }        
        .summary-total{
            font-size: 16px;
            color: #2d2d2d;
        }
        .greetings{
            font-size: 16px;
            margin-bottom: 4px;
        }
        .msg{
            font-size: 13px;
            margin-bottom: 25px;
            line-height: 1.7rem;
        }

    </style>
    <!-- END CSS STYLES -->
</head>

<body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td class="container">
                <!-- START CENTERED WHITE CONTENT -->
                <div class="content">
                    <!-- START PREHEADER -->
                    {{-- <span class="preheader">Preheader</span> --}}
                    <!-- END PREHEADER -->
                    <table class="main">
                        <!-- START MAIN CONTENT -->
                        <tr>
                            <td class="wrapper">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <div class="logo">
                                                <a href="*|BASE_URL|*" target="_blank"><img src="{{ url('/logo.svg') }}"
                                                        alt="Game of Thornes" /></a>
                                                <hr /> 
                                            </div>
                                            <p class="welcome">Welcome onboard!</p>
                                            <!-- START BUTTON TEMPLATE -->
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="greetings">Hi {{$user->user()->name}},</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="msg">Thank you for choosing to book with us!
                                                                                We're excited to confirm that your
                                                                                booking has been successfully received.
                                                                                Your Reference Number is:
                                                                                <strong>{{$payment->transaction_code}}</strong>. Please present
                                                                                your reference to the cashier to process
                                                                                your payment.
                                                                            </p>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="summary-body">
                                                                            <table border="0" cellpadding="0"
                                                                                cellspacing="0">
                                                                                <tbody >
                                                                                    <tr>
                                                                                        <td>
                                                                                            <p class="summary-title">Booking
                                                                                                Summary</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <p class="summary-type">
                                                                                                @switch($payment->ticket->type_id)
                                                                                                    @case(1)
                                                                                                        Passenger
                                                                                                        @break
                                                                                                    @case(2)
                                                                                                        Rolling Cargo
                                                                                                        @break
                                                                                                    @case(3)
                                                                                                        Drop Cargo
                                                                                                        @break
                                                                                                    @default
                                                                                                        
                                                                                                @endswitch
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <table border="0"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                <td>
                                                                                                    <p class="summary-text currency">
                                                                                                        {{ $payment->ticket->vessel->name}}
                                                                                                    </p>
                                                                                                <hr />
                                                                                                </td>
                                                                                                <td>
                                                                                                    <p class="summary-text right">
                                                                                                        Vessel</p>
                                                                                                        <hr />
                                                                                                </td>
                                                                                            </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <p class="summary-text currency">
                                                                                                            {{ $payment->ticket->fare->route->origin . ' - ' . $payment->ticket->fare->route->destination}}
                                                                                                        </p>
                                                                                                    <hr />
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p class="summary-text right">
                                                                                                            Routes</p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text currency">
                                                                                                            {{ '₱ ' . number_format($payment->ticket->fare->fare, 2)}}
                                                                                                        </p>
                                                                                                        
                                                                                                    <hr />
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text right">
                                                                                                            Amount</p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr class="fares">
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text currency">
                                                                                                            {{ $user->additional == 2 ? '₱ ' . number_format($payment->ticket->fare->additional_fee, 2) : '₱ 0.00' }}</p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text right">
                                                                                                            Additional Fee</p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text currency">
                                                                                                            {{ '₱ ' . number_format(($payment->ticket->fare->fare + ($user->additional == 2 ? $payment->ticket->fare->additional_fee : 0)), 2)}}
                                                                                                        </p>
                                                                                                        
                                                                                                    <hr />
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text right">
                                                                                                            SubTotal</p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr class="fares">
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text">
                                                                                                            {{$payment->ticket->discount->name}} {{$payment->ticket->discount->description}}
                                                                                                        </p>
                                                                                                        <hr />
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text right">
                                                                                                            Discount
                                                                                                        </p>
                                                                                                        <hr />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr class="fares">
                                                                                                    <td>
                                                                                                        <p class="summary-text currency">
                                                                                                            {{ '- ₱ ' . number_format(
                                                                                                                ($payment->ticket->fare->fare + 
                                                                                                                ($user->additional == 2 ? $payment->ticket->fare->additional_fee : 0)) * 
                                                                                                                ($payment->ticket->discount->percentage), 2)
                                                                                                            }}
                                                                                                        </p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-text right">
                                                                                                            Amount Off</p>
                                                                                                            <hr />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-total currency">
                                                                                                            {{'₱ ' . number_format($payment->total_amount, 2)}}</p>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p
                                                                                                            class="summary-total right">
                                                                                                            Total</p>
                                                                                                    </td>

                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </tr>
                                                                                </tbody>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- END BUTTON TEMPLATE -->
                                            {{-- <p>Warmly,<br /><strong>The Game of Thornes</strong></p> --}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- END FOOTER -->
                </div>
                <!-- END CENTERED WHITE CONTENT -->
            </td>
        </tr>
    </table>
</body>

</html>
