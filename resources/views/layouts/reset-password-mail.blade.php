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


<body style="background-color: #f9f9f9;margin: 0;padding: 0;display: flex;justify-content: center;">

<div class="main" style=" height: fit-content;  margin-inline: 5%;">

    <div class="header" style="background-color: #BE202E;">
        <h1 style="text-align: center; color: #ffffff; margin: 0px;  padding: 4%;">Password Reset Link</h1>
    </div>

    <div class="content" style="padding: 2%;">
        <h3>Hello {{$firstName ?? ''}}  {{$lastName ?? ''}},</h3>
        <p>
            Please click below the link to reset password
        </p>
        <div class="inner" style="">
            <a href='{{\Illuminate\Support\Facades\URL::to('password/reset')}}/{{$token}}' target="_blank" style="color: blue;">
                <u> {{$token}}</u>
            </a>
        </div>
    </div>
    {{--    <hr>--}}
    <div class="footer" style="padding: 1% 2% ; background-color: #BE202E; color: #FFFFFF;">
        <p>Need help? Contact our support team or hit us up on.</p>
    </div>
</div>

</body>

</html>

