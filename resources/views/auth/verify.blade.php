@extends('layout.master')
@section("title","تایید ایمیل")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section('content')
<main class="d-flex justify-content-center pb-5">
    <div class="container row d-flex justify-content-center">
        <div class="col-md-7 col-sm-10 col-12">
            <div class="box w-100 rounded-4 shadow p-3 py-4">
                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ایمیلی برای انجام عملیات تایید برای شما فرستاده شد.') }}
                        </div>
                    @endif

                    <p class="text-light">ما ایمیلی را برای شما فرستادیم لطفا انرا چک و عملیات تایید را انجام دهید . اگر هم ایمیلی دریافت نکردید : </p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="border-0 bg1 rounded-3 text-white py-2 px-4">{{ __('ارسال مجدد ایمیل تایید') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section("script_before")
    <script>
        var bg_dark = [{img_src: ""}];
        var bg_light = [null, {img_src: ""}];
    </script>
@endsection
