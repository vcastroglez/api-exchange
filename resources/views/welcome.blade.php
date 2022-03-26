<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Vue SPA</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="https://kit.fontawesome.com/8632743a2c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>
<body>
<div id="vue"></div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
