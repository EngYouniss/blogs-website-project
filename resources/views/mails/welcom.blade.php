<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Younis tallan website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            width: 120px;
        }
        .content {
            padding: 20px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="{{ asset('admin/assets/images/يونس.jpg') }}" alt="Your Logo">
    </div>
    <div class="content">
        <h2>Welcome to blogs website 🎉</h2>
        <p>Hi  {{ $userData['name']}} ,</p>
        <p>Your Email is {{$userData['email'] }} <br> Your password is :  {{ $userData['password'] }}   </p>
        <p>Click the button below to start using your account:</p>
        <a href="http://127.0.0.1:8000/auth/login" class="button">Go to login</a>
    </div>
    <div class="footer">
        <p>If you have any questions, feel free to <a href="mailto:support@yourapp.com">contact us</a>.</p>
        <p>Best Regards, <br> The blogs website  Team</p>
    </div>
</div>

</body>
</html>
