<!DOCTYPE html>
<html lang="fa">
<head>
    <!--meta tag-->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="developer" content="mohamadreza nasrale zade---mohamadreza1388.org@gmail.com">
    <meta name="developer phone" content="09030422838">
    <!--web title-->
    <title>@yield("title")</title>
    <!--web favicon-->
    <link rel="icon" type="image/png" href="{{ asset("assets/images/favicon.png") }}" sizes="30x30">
    <!--css link-->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/panel.css') }}">
    @yield("link")
</head>
<body class="bg3" theme="dark">
<div class="loading">
    <div class="loader"></div>
</div>
<div class="d-flex vh-100 w-100 overflow-hidden content-container gap-3">
    @include('admin.layouts.partials.sideBar')
    @yield("content")
</div>
{{--    scripts link--}}
@yield("script_before")
<script src="{{ asset("assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
<script type="module" src="{{ asset("assets/js/bootstrap.esm.min.js") }}"></script>
<script type="module" src="{{ Vite::asset('resources/js/panel.js') }}"></script>
@yield("script_after")
</body>
</html>
