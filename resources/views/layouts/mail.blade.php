<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #f9f9f9;margin: 0;padding: 0;">

<div class="main" style="position: absolute;width:40%; height: fit-content; background: white; margin-inline: 5%; padding: 2%;">
    <h3>Hello form {{$name ?? ''}},</h3>
    <p>
        Hope you are doing well.
    </p>
    <div class="inner" style="text-align: center;">
        {{$data['message'] ?? ''}}
    </div>
    <p>
        Need help? Contact our support team or hit us up on twitter@GoFrenchie.
    </p>
    <p>
        Want to give us feedback? Let us know what you think on our feedback site.
    </p>
</div>

</body>
</html>
