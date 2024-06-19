@extends('layout.master')
@section("title","ثبت نام")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section('content')
    <main class="d-flex justify-content-center pb-5">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <div class="register w-100 rounded-4 shadow p-3 py-4">
                    <div class="wrapper mb-3 d-flex justify-content-center gap-3 mx-auto">
                        <a href="{{ route("login") }}" class="fw-semibold rounded-3 d-flex justify-content-center align-items-center gap-2">
                            ورود
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M6.66667 11.6667C5.74619 11.6667 5 10.9205 5 10C5 9.07952 5.74619 8.33333 6.66667 8.33333C7.58714 8.33333 8.33333 9.07952 8.33333 10C8.33333 10.9205 7.58714 11.6667 6.66667 11.6667Z"></path>
                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M0 10C0 18.235 1.765 20 10 20C18.235 20 20 18.235 20 10C20 1.765 18.235 0 10 0C1.765 0 0 1.765 0 10ZM6.66667 13.3333C4.82572 13.3333 3.33333 11.8409 3.33333 10C3.33333 8.15905 4.82572 6.66667 6.66667 6.66667C8.22215 6.66667 9.52879 7.73211 9.89661 9.17302C9.93049 9.16883 9.96499 9.16667 10 9.16667H15.8333C16.2936 9.16667 16.6667 9.53976 16.6667 10V12.5C16.6667 12.9602 16.2936 13.3333 15.8333 13.3333C15.3731 13.3333 15 12.9602 15 12.5V10.8333H13.3333V11.6667C13.3333 12.1269 12.9602 12.5 12.5 12.5C12.0398 12.5 11.6667 12.1269 11.6667 11.6667V10.8333H10C9.96499 10.8333 9.93049 10.8312 9.89661 10.827C9.52879 12.2679 8.22215 13.3333 6.66667 13.3333Z"></path>
                            </svg>
                        </a>
                        <a href="{{ route("register") }}" class="fw-semibold rounded-3 d-flex justify-content-center align-items-center gap-2 active">
                            ثبت نام
                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M3.84615 4.61538C3.84615 7.16439 5.91253 9.23077 8.46154 9.23077C11.0105 9.23077 13.0769 7.16439 13.0769 4.61538C13.0769 2.06638 11.0105 0 8.46154 0C5.91253 0 3.84615 2.06638 3.84615 4.61538ZM5.38462 4.61538C5.38462 6.31472 6.7622 7.69231 8.46154 7.69231C10.1609 7.69231 11.5385 6.31472 11.5385 4.61538C11.5385 2.91605 10.1609 1.53846 8.46154 1.53846C6.7622 1.53846 5.38462 2.91605 5.38462 4.61538Z"></path>
                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M0 14.6154C0 17.7827 1.49346 18.4615 8.46154 18.4615C15.4296 18.4615 16.9231 17.7827 16.9231 14.6154C16.9231 11.4481 15.4296 10.7692 8.46154 10.7692C1.49346 10.7692 0 11.4481 0 14.6154ZM1.53846 14.6154C1.53846 15.3149 1.62639 15.6765 1.72434 15.8768C1.79381 16.0189 1.9072 16.1678 2.25436 16.3256C2.6518 16.5063 3.29776 16.6686 4.35439 16.7753C5.39628 16.8806 6.73474 16.9231 8.46154 16.9231C10.1883 16.9231 11.5268 16.8806 12.5687 16.7753C13.6253 16.6686 14.2713 16.5063 14.6687 16.3256C15.0159 16.1678 15.1293 16.0189 15.1987 15.8768C15.2967 15.6765 15.3846 15.3149 15.3846 14.6154C15.3846 13.9159 15.2967 13.5543 15.1987 13.354C15.1293 13.2119 15.0159 13.0629 14.6687 12.9051C14.2713 12.7245 13.6253 12.5622 12.5687 12.4555C11.5268 12.3502 10.1883 12.3077 8.46154 12.3077C6.73474 12.3077 5.39628 12.3502 4.35439 12.4555C3.29776 12.5622 2.6518 12.7245 2.25436 12.9051C1.9072 13.0629 1.79381 13.2119 1.72434 13.354C1.62639 13.5543 1.53846 13.9159 1.53846 14.6154Z"></path>
                                <path fill="currentColor" d="M17.6919 5.38447C17.6919 4.95963 17.3475 4.61523 16.9226 4.61523C16.4978 4.61523 16.1534 4.95963 16.1534 5.38447V6.92293H14.6149C14.1901 6.92293 13.8457 7.26732 13.8457 7.69216C13.8457 8.11699 14.1901 8.46139 14.6149 8.46139H16.1534V9.99985C16.1534 10.4247 16.4978 10.7691 16.9226 10.7691C17.3475 10.7691 17.6919 10.4247 17.6919 9.99985V8.46139H19.2303C19.6552 8.46139 19.9995 8.11699 19.9995 7.69216C19.9995 7.26732 19.6552 6.92293 19.2303 6.92293H17.6919V5.38447Z" fill-opacity="0.4"></path>
                            </svg>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label text-light">
                                نام
                                <span class="red fw-semibold">*</span>
                            </label>
                            <input id="name" type="text" class="py-2 form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label text-light">
                                نام خانوادگی
                            </label>
                            <input id="last_name" type="text" class="py-2 form-control @error('last_name') is-invalid @enderror"
                                   name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label text-light">
                                ایمیل
                                <span class="red fw-semibold">*</span>
                            </label>
                            <input id="email" type="email"
                                   class="py-2 form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="form-label text-light">
                                جنسیت
                                <span class="red fw-semibold">*</span>
                            </label>
                            <select name="gender" id="gender"
                                    class="py-2 form-select @error('gender') is-invalid @enderror">
                                <option value="">انتخاب کنید...</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->title }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-light">
                                رمز عبور
                                <span class="red fw-semibold">*</span>
                            </label>
                            <input id="password" type="password"
                                   class="py-2 form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-light">
                                تایید رمز عبور
                                <span class="red fw-semibold">*</span>
                            </label>
                            <input id="password-confirm" type="password" class="py-2 form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="border-0 bg1 rounded-3 text-white py-2 px-4">ثبت نام</button>
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
