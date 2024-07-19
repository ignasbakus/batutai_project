<!DOCTYPE html>
<html>
<head>
    <title>Gautas naujas užsakymas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .order-details, .customer-info, .price-info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Gautas naujas užsakymas</h1>

    <!-- Order Information -->
    <h2 class="mt-4">Užsakymo detalės</h2>
    <table class="table table-bordered">
        <tr>
            <th>Užsakymo data</th>
            <th>Užsakymo numeris</th>
            <th>Batutas</th>
            <th>Nuomos pradžia</th>
            <th>Nuomos pabaiga</th>
            <th>Pristatymo laikas</th>
        </tr>
        @foreach($order->trampolines as $orderTrampoline)
            <tr>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $orderTrampoline->trampoline->title }}</td>
                <td>{{ \Carbon\Carbon::parse($orderTrampoline->rental_start)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($orderTrampoline->rental_end)->subDay()->format('Y-m-d') }}</td>
                <td> {{ $orderTrampoline->delivery_time }} </td>
            </tr>
        @endforeach
    </table>

    <!-- Customer Information -->
    <h2 class="mt-4">Kliento informacija</h2>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">Vardas:</th>
            <td>{{ $order->client->name }}</td>
        </tr>
        <tr>
            <th scope="row">Pavardė:</th>
            <td>{{ $order->client->surname }}</td>
        </tr>
        <tr>
            <th scope="row">Telefono numeris:</th>
            <td>{{ $order->client->phone }}</td>
        </tr>
        <tr>
            <th scope="row">Elektroninis paštas:</th>
            <td>{{ $order->client->email }}</td>
        </tr>
        <tr>
            <th scope="row">Miestas:</th>
            <td>{{ $order->address->address_town }}</td>
        </tr>
        <tr>
            <th scope="row">Adresas:</th>
            <td>{{ $order->address->address_street . '; ' . $order->address->address_postcode }}</td>
        </tr>
        </tbody>
    </table>

    <h2 class="mt-4">Mokama suma</h2>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">Bendra suma:</th>
            <td>{{ number_format($order->total_sum, 2) }}{{config('trampolines.currency') }}</td>
        </tr>
        <tr>
            <th scope="row">Sumokėta avanso suma:</th>
            <td>{{ number_format($order->advance_sum, 2) }}{{config('trampolines.currency') }}</td>
        </tr>
        <tr>
            <th scope="row">Suma mokama vietoje:</th>
            <td>{{ number_format($order->total_sum, 2) - number_format($order->advance_sum, 2) }}{{config('trampolines.currency')}}</td>
        </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Automatinis pranešimas</p>
    </div>
</div>
</body>
</html>
