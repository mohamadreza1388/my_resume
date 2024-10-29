<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>محمد رضا نصراله زاده</title>
    @vite("resources/css/app.css")
</head>
<body class="bg-[#27272A]">
@include("layouts.partials.header")

@yield("content")

@vite("resources/js/app.js")
</body>
</html>
