<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.rtl.min.css") }}">
    <style>
        @font-face {
            font-family: "morabba";
            font-weight: 900;
            src: url("http://127.0.0.1:8000/assets/fonts/morabba/Morabba-Bold.woff2") format("woff2");
        }
        *{
            box-sizing: border-box;
            font-family: "morabba",iranyekan,sans-serif;
        }
        body{
            direction: rtl;
            padding: 12px;
            background-color: #181B2D;
        }
        .content{
            width: 100%;
            height: 100%;
            background-image: linear-gradient(234deg,#272f51, #3a4677);
        }
        .back-number{
            top: 50%;
            right: 50%;
            transform: translate(50%, -65%);
            font-size: 20vw;
            color: #3a487c;
            text-shadow: 13px 5px 18px #3a4677;
            user-select: none;
        }
        .box{
            top: 50%;
            right: 50%;
            width: 100%;
            transform: translate(50%, 50%);
        }
        .box .button:is(:link,:visited){
            border: 3px solid #28F6F5;
            color: white;
            width: 120px;
            transition: all 300ms;
        }
        .box .button:is(:link,:visited):hover{
            box-shadow: 0 0 20px 0 #28F6F5;
        }
        @media screen and (max-width: 500px) {
            .back-number{
                font-size: 25vw;
            }
        }
    </style>
    @yield("css")
</head>
<body class="m-0 vh-100 d-flex justify-content-center align-items-center">
<main class="content rounded-3 position-relative">
@yield("content")
    <div class="box position-absolute d-flex flex-column justify-content-center align-items-center gap-2">
        <h4 class="text-light">متاسفانه این صفحه در دسترس نیست</h4>
        <a href="/" class="rounded-4 text-center button p-2 color-white text-decoration-none"> صفحه اصلی</a>
    </div>
</main>
<script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
</body>
</html>
