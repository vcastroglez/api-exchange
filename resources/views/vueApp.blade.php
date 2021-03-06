<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API Exchange</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <script>
        window.USER = JSON.parse('{!! json_encode($user)  !!}')
    </script>
</head>
<body>
<div id="vue"></div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
