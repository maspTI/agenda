<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#fff">
    <link rel="icon" href="{{ secure_asset('favicon.ico') }}">
    <title>{{ env('APP_NAME') }} @yield('title')</title>
    <link rel="manifest" href="{{ secure_asset('manifest.json') }}">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/agenda_dash.css') }}">
</head>
<body>
    <div id="app">
        @include('layouts.header')
        <main class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <h2>Ramais</h2>
                </div>
            </div>
            @include('layouts.navbar')
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
    <script type="text/javascript" src="{{ secure_asset('js/agenda_dash.js') }}"></script>
</body>
</html>
