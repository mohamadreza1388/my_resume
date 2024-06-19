@extends("admin.layouts.singlePage")
@section("title","dashboard")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section("content")
    <main class="tab shadow p-3 overflow-auto d-block">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <form method="post" action="{{ route("way_communication-post-create") }}">
                    @csrf

                    <div class="mb-4">
                        <label for="imgSrc" class="form-label text-light">
                            ادرس عکس
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="imgSrc" type="text" class="py-2 form-control @error('imgSrc') is-invalid @enderror"
                               name="imgSrc" required autocomplete="imgSrc" autofocus>
                        @error('imgSrc')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title" class="form-label text-light">
                            عنوان
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="title" type="text" class="py-2 form-control @error('title') is-invalid @enderror"
                               name="title" required autocomplete="title" autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="platformName" class="form-label text-light">
                            نام پلتفرم
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="platformName" type="text" class="py-2 form-control @error('platformName') is-invalid @enderror"
                               name="platformName" required autocomplete="platformName" autofocus>
                        @error('platformName')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="link" class="form-label text-light">
                            ادرس لینک
                            <span class="red fw-semibold">*</span>
                        </label>
                        <select name="link" id="link"
                                class="py-2 form-select @error('link') is-invalid @enderror">
                            <option value="">انتخاب کنید...</option>
                            @foreach($links as $link)
                                <option value="{{ $link->id }}">{{ $link->link }} : {{ $link->title }}</option>
                            @endforeach
                        </select>
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tooltip" class="form-label text-light">
                            تولتیپ
                        </label>
                        <input id="tooltip" type="text" class="py-2 form-control @error('tooltip') is-invalid @enderror"
                               name="tooltip" autocomplete="tooltip" autofocus>
                        @error('tooltip')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="fontIcon" class="form-label text-light">
                            فونت ایکون
                        </label>
                        <input id="fontIcon" type="text" class="py-2 form-control @error('fontIcon') is-invalid @enderror"
                               name="fontIcon" autocomplete="fontIcon" autofocus>
                        @error('fontIcon')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="at" class="form-label text-light">
                            داخل
                        </label>
                        <input id="at" type="text" class="py-2 form-control @error('at') is-invalid @enderror"
                               name="at" autocomplete="at" autofocus>
                        @error('at')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="border-0 bg1 rounded-3 text-white py-2 px-4">ایجاد راه ارتباطی</button>
                    </div>
                </form>
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
