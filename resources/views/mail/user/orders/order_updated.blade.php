<!DOCTYPE html>
<html>
<head>
    <title>Užsakymo atnaujinimas</title>
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
            text-align: center;
        }

        .header {
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
            font-size: 16px;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Jūsų užsakymas atnaujintas</h1>
    </div>

    <div class="content">
        <p>Gerbiamas kliente,</p>
        <p>Informuojame, kad Jūsų užsakymas buvo atnaujintas.</p>
        <p>Norėdami peržiūrėti savo atnaujintą užsakymą, <a href="{{url('/orders/public/order/view/' . $order->order_number)}}">spauskite čia</a>:</p>
    </div>

    <div class="footer">
        <p>Jeigu turite klausimų, susisiekite su mumis el. paštu {{config('contactInfo.email')}} arba telefonu {{config('contactInfo.phone')}}.</p>
        <p>Ačiū, kad rinkotės mus!</p>
    </div>
</div>
</body>
</html>

