@extends('layout.master')
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section('content')
    <main class="d-flex justify-content-center pb-5">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <div class="box w-100 rounded-4 shadow p-3 py-4">
                    <h4 class="text-light mx-auto text-center fw-semibold mt-0 mb-4">تغییر رمز عبور</h4>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-light">
                                ادرس ایمیل
                                <span class="red fw-semi-bold">*</span>
                            </label>
                            <input id="email" type="email"
                                   class="form-control py-2 @error('email') is-invalid @enderror" name="email"
                                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-light">
                                رمز عبور جدید
                                <span class="red fw-semi-bold">*</span>
                            </label>
                            <input id="password" type="password"
                                   class="form-control py-2 @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-light">
                                تکرار رمز عبور
                                <span class="red fw-semi-bold">*</span>
                            </label>
                            <input id="password-confirm" type="password" class="py-2 form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-0 d-flex justify-content-center">
                            <button type="submit" class="py-2 px-4 bg1 text-white border-0 rounded-3 ">
                                بازیابی رمز عبور
                            </button>
                        </div>
                    </form>
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
