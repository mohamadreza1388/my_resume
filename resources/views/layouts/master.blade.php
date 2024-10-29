<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>محمد رضا نصراله زاده</title>
    @vite("resources/css/app.css")
</head>
<body class="dark:bg-[#27272A] bg-[#F3F4F6]">
@include("layouts.partials.header")

@yield("content")

@vite("resources/js/app.js")
</body>
</html>
