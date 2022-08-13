<!doctype html>
<!--
* Copyright 2018-2022 auzan DEV
* Licensed under MIT
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="{{asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{asset('dist/css/demo.min.css') }}" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
       @yield('content')
    </div>
    <!-- Libs JS -->
</body>

</html>
