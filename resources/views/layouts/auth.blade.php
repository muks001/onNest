<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Fonts -->

    <!--CSS-->
    <link rel='stylesheet' type='text/css' media='screen' href='{{asset("css/auth.css")}}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{asset("css/bootstrap.min.css")}}'>
    <!--CSS-->
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    @yield('script')
</body>
</html>
