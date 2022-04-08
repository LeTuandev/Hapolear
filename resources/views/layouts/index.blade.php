<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="icon" type="image/x-icon" href="{{asset('images/ellipse_7.png')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>

    <body>
        @include('layouts/header')
        @include('layouts/modal')
        @include('layouts/messenger')
        @yield('content')
        @include('layouts/footer')
    </body>

    <script src="{{asset('js/app.js')}}"></script>
</html>
