<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Interview project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

        <style>
            body{
               padding: 40px; 
            }
        </style>
    </head>
    <body>

    <div id="app">
        <match-component></match-component>
    </div>

    <script src="{{ asset('bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
