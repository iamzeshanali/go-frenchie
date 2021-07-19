<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="background-color: #f9f9f9;margin: 0;padding: 0;">

<div class="main" style="position: absolute;width:40%; height: fit-content; background: white; margin-inline: 5%; padding: 2%;">
    <h3>Hello {{$username ?? ''}},</h3>
    <p>
        Please click below the link to reset password
    </p>
    <div class="inner" style="text-align: center;">
        <a href='{{\Illuminate\Support\Facades\URL::to('password/reset')}}/{{$token}}' target="_blank" style="color: blue;">
            <u> {{$token}}</u>
        </a>
    </div>
    <p>
        Need help? Contact our support team or hit us up on Twitter @Frenchbulldog.
    </p>
    <p>
        Want to give us feedback? Let us know what you think on our feedback site.
    </p>
</div>

</body>

</html>

