<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>محمد رضا نصراله زاده</title>
    @vite("resources/css/app.css")
</head>
<body class="dark:bg-[#27272A] bg-[#F3F4F6]">
@yield("content")

<div class="overlay fixed top-0 right-0 w-full h-[100vh] bg-black/40 z-[51] hidden opacity-0"></div>

@vite("resources/js/app.js")
</body>
</html>
