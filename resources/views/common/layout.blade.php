<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Event Mng Sys</title>

    @include('common.styles')
</head>

<body>

<div id="preloader">
    <div class="loader"></div>
</div>

<div class="page-container">
    @include('common.sidebar')

    <div class="main-content">
        @include('common.header')
        @yield('content')
    </div>

    @include('common.footer')
</div>

@include('common.scripts')
@yield('scripts')

</body>
</html>
