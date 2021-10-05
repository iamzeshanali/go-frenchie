<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form Email Template</title>
</head>
<body style="background-color: #f9f9f9;margin: 0;padding: 0;display: flex;justify-content: center;">

<div class="main" style=" height: fit-content;  margin-inline: 5%;">

    <div class="header" style="background-color: #BE202E;">
        <h1 style="text-align: center; color: #ffffff; margin: 0px;  padding: 4%;">Contact Form Notification</h1>
    </div>

    <div class="content" style="padding: 2%;">
        <p><b>Form:</b> {{$name ?? ''}},</p>
        <p><b>Email:</b> {{$email ?? ''}}</p>
        <p><b>Subject:</b>{{$subject  ?? ''}}</p>
        <div class="inner" style="">
            <h3>Message Body</h3>
            {{$data['message'] ?? ''}}
        </div>


    </div>
    {{--    <hr>--}}
    <div class="footer" style="padding: 1% 2% ; background-color: #BE202E; color: #FFFFFF;">
        <p>Need help? Contact our support team or hit us up on.</p>
    </div>
</div>

</body>
</html>

