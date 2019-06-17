<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pantry</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
</head>
<body class="font-sans bg-gray-100">
    <div id="app"></div>
    <script src="{{ mix("js/app.js") }}"></script>
</body>
</html>
