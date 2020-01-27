<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('/favicon.ico') }}">
    <title>{{ env('APP_NAME') }} @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/agenda.css') }}">
</head>
<body>
    <div class="container" id="app">
        @yield('content')
        <footer class="row mt-2">
            <div class="col-md-12">
                <p class="text-center">&copy;<span class="masp-logo">MASP</span> 2019</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/agenda.js') }}"></script>
</body>
</html>
