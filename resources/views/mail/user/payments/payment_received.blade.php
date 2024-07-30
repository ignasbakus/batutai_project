<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batuto Nuomos Patvirtinimas</title>
    <link href="/frameworks/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/frameworks/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .containerMain {
            /*text-align: center; !* Center-align all children *!*/
        }

        .container-inside {
            /* Ensure max-width and auto margins for centering */
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 10px;
        }

        .logo {
            display: flex;
            justify-content: center; /* Center image horizontally */
            align-items: center; /* Center image vertically */
            height: 100px; /* Set a height to center vertically */
            background-color: #B6D2F7;
            max-width: 650px;
            margin: 0 auto;
        }

        .logo img {
            width: 70px;
            display: block; /* Ensures image is treated as a block element */
        }

        .confirmation {
            text-align: center;
            margin-bottom: 50px;
        }

        .confirmationHeader {
            font-weight: 600;
            font-size: 27px;
        }

        .orderButton {
            background-color: #B6D2F7;
            padding: 10px;
            border: none;
            color: black;
            font-weight: 500;
        }

        .details {
            background-color: #B6D2F7;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .details span {
            font-size: 17px;
            color: #124E78;
        }

        .details h3 {
            color: #124E78;
            margin-top: 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #ffffff;
            padding-bottom: 5px;
        }

        .editOrder {
            background-color: #F5F7F7;
            padding: 30px;
            border-radius: 5px;
            margin-bottom: 40px;
            color: #124E78;
            text-align: center;
        }

        .info-label {
            font-weight: 500;
        }

        .info-grid {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 5px 10px;
        }

        .info-grid span:not(.info-label) {
            text-align: right;
        }

        .important-info {
            background-color: #124E78;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }

        .footer {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Center items horizontally */
            justify-content: center; /* Center items vertically */
            font-size: 12px;
            color: black;
            background-color: #B6D2F7;
            max-width: 650px;
            min-height: 150px;
            margin: 0 auto; /* Center the footer */
            padding: 20px; /* Add some padding for better spacing */
            text-align: center; /* Center text inside the footer */
        }

        .footer a {
            margin-bottom: 10px;
            text-decoration: none;
            color: black;

        }

        .footer svg p {
            margin-top: 10px; /* Add space between the link and the icon */
        }
    </style>
</head>
<body>
<div class="containerMain">
    <div class="logo">
        <img src="/images/companyLogo/logo.png" style="width: 70px;">
    </div>
    <div class="container-inside">
        <div class="confirmation">
            <p class="confirmationHeader">Jūsų užsakymas apmokėtas!</p>
            <p>Užsakymo nr. <span style="font-weight: 600">{{ $order->order_number }}</span></p>
        </div>

        <p>Gerb. kliente,</p>

        <p style="margin-bottom: 40px">Jūsų batuto nuomos užsakymas patvirtintas. Žemiau rasite užsakymo detales.</p>

        <div class="editOrder">
            <button href="{{ url('/orders/public/order/view/' . $order->order_number) }}"
                    class="btn btn-primary orderButton">Redaguoti užsakymą
            </button>
        </div>

        <p style="margin-bottom: 40px"><span style="font-weight: 700">Svarbi informacija!</span> Jeigu užsakymą
            atšauksite, avansas bus negrąžinamas.</p>

        <h4>Užsakymo informacija</h4>
        <div class="details">
            <div class="order-info">
                <div class="info-grid">
                    <span class="info-label">Rezervuotos dienos:</span>
                    <span>{{ $order->trampolines->rental_start->first()->format('Y-m-d') }} - {{ $order->trampolines->rental_end->first()->subDay()->format('Y-m-d') }}</span>
                    <span class="info-label">Pristatymo laikas:</span>
                    <span>{{$order->trampolines->delivery_time}}</span>
                    <span class="info-label">Batutai:</span>
                    <span>
                        @foreach($order->trampolines as $orderTrampoline)
                        {{$orderTrampoline->trampoline->title}}<br>
                        @endforeach
                    </span>
                    <span class="info-label">Avansas:</span>
                    <span>{{ number_format($order->advance_sum, 2) }}{{config('trampolines.currency')}}</span>
                    <span class="info-label">Likusi mokėti suma:<span style="color: red">  *</span></span>
                    <span>{{ number_format($order->total_sum, 2) - number_format($order->advance_sum, 2) }}{{config('trampolines.currency')}}</span>
                </div>
            </div>
        </div>

        <div>
            <p style="font-size: 15px; margin-bottom: 40px"><span style="color: red">* </span>Prie likusios mokėti sumos
                prisidės papildomos išlaidos už pristatymą.</p>
        </div>

        <h4>Kliento informacija</h4>
        <div class="details">
            <div class="order-info">
                <div class="info-grid">
                    <span class="info-label">Vardas Pavardė:</span>
                    <span>{{ $order->client->name }} {{ $order->client->surname }}</span>
                    <span class="info-label">Telefonas: </span>
                    <span>{{ $order->client->phone }}</span>
                    <span class="info-label">Miestas:</span>
                    <span>{{ $order->address->address_town }}</span>
                    <span class="info-label">Gatvė:</span>
                    <span>{{ $order->address->address_street }}</span>
                    <span class="info-label">Pašto kodas:</span>
                    <span>{{ $order->address->address_postcode }}</span>
                </div>
            </div>
        </div>

        <div style="margin-top: 40px">
            <p>Dėkojame, kad pasirinkote op-op batutų nuomą!</p>
            <p>Jei kiltų klausimų - drąsiai susisiekite telefonu {{config('contactInfo.phone')}} ar el.paštu {{config('contactInfo.email')}} ir mes Jums mielai
                padėsime.</p>
        </div>

    </div>

    <div class="footer">
        <a href="ADDLINKTOFACEBOOK">
            <svg style="margin-bottom: 10px" width="20" height="20" fill="currentColor" class="bi bi-facebook"
                 viewBox="0 0 16 16">
                <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
            </svg>
        </a>
        <a href="configas" style="font-size: 16px;">op-op.lt</a>
        <a href="{{config('contactInfo.phone')}}" style="font-size: 18px; font-weight: 500; text-decoration: none; color: black">
            <svg width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path
                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path>
            </svg>
            {{config('contactInfo.phone')}}</a>
    </div>
</div>
</body>
</html>
