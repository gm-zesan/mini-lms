<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="app, landing, corporate, Creative, Html Template, Template">
    <meta name="author" content="web-themes">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') || Mini LMS</title>
    @include('frontend.partials.styles')
    @include('frontend.partials.favicon')
    @stack('styles')
</head>

<body>
    {{-- <div class="cursor"></div> --}}
    <!-- Preloader Start -->
    <!-- <div id="preloader">
        <div class="loader3">
            <span></span>
            <span></span>
        </div>
    </div> -->
    <!-- Preloader End -->
    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')
    @include('frontend.partials.scripts')
    @stack('scripts')
</body>

</html>
