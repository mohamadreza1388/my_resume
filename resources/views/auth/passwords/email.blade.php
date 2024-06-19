@extends('layout.master')
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section('content')
    <main class="d-flex justify-content-center pb-5">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <div class="box w-100 rounded-4 shadow p-3 py-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="text-light mx-auto text-center fw-semibold mt-0 mb-4">بازیابی رمز عبور</h4>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label text-light fw-semibold">ادرس ایمیل
                                <span class="red fw-semi-bold">*</span>
                            </label>
                            <input id="email" type="email"
                                   class="py-2 form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-0 d-flex justify-content-center">
                            <button type="submit" class="py-2 px-4 bg1 text-white border-0 rounded-3 ">
                                ارسال لینک بازیابی رمز عبور
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

