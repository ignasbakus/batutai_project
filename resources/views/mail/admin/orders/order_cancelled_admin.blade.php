<!DOCTYPE html>
<html>
<head>
    <title>Užsakymas atšauktas</title>
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

        .content {
            margin-bottom: 20px;
        }

        .content p {
            margin: 0 0 10px;
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
    <div class="header">
        <h1>Užsakymas atšauktas</h1>
    </div>

    <!-- Cancellation Notification -->
    <div class="content">
        <p>Informuojame, kad užsakymas numeris <strong>{{ $order->order_number }}</strong> buvo atšauktas.</p>
        <p>Sumokėta avanso suma: <strong>{{ number_format($order->advance_sum, 2) }}{{ config('trampolines.currency') }}</strong></p>
    </div>

    <div class="footer">
        <p>Automatinis pranešimas. Prašome nesakyti į šį pranešimą.</p>
    </div>
</div>
</body>
</html>

