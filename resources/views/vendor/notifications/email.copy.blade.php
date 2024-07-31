<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, sans-serif;
            color: #333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-width: 200px;
        }
        .content {
            margin: 20px 0;
        }
        .content h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .content p {
            margin: 0 0 15px;
        }
        .button {
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .footer p {
            margin: 0;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
    <title></title>
</head>
<body>
<div class="container">
    <div class="header">
    </div>
    <div class="content">
        <h1>Slaptažodžio Atstatymo Prašymas</h1>
        <p>Sveiki,</p>
        <p>Mes gavome prašymą atstatyti jūsų slaptažodį. Paspauskite žemiau esantį mygtuką, kad atstatytumėte slaptažodį:</p>
        <p><a href="{{ $actionUrl }}" class="button">Atstatyti Slaptažodį</a></p>
        <p>Jei slaptažodžio atstatymo prašymas nebuvo atliktas jūsų, galite ignoruoti šį laišką.</p>
        <p>Ačiū,</p>
        <p>Jūsų Įmonė</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Jūsų Įmonė. Visos teisės saugomos.</p>
        <p><a href="{{ config('app.url') }}">Apsilankykite mūsų svetainėje</a></p>
    </div>
</div>
</body>
</html>
