@extends("admin.layouts.singlePage")
@section("title","dashboard")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section("content")
    <main class="tab shadow p-3 overflow-auto d-block">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <form method="post" action="{{ route("work_sample-post-edit",$work_sample->id) }}">
                    @csrf
                    @method("put")

                    <div class="mb-4">
                        <label for="title" class="form-label text-light">
                            عنوان
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="title" type="text" class="py-2 form-control @error('title') is-invalid @enderror"
                               name="title" required autocomplete="title" autofocus value="{{ $work_sample->work_title }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="subTitle" class="form-label text-light">
                            زیر عنوان
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="subTitle" type="text" class="py-2 form-control @error('subTitle') is-invalid @enderror"
                               name="subTitle" required autocomplete="subTitle" autofocus value="{{ $work_sample->information_title }}">
                        @error('subTitle')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="imgSrc" class="form-label text-light">
                            ادرس عکس
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="imgSrc" type="text" class="py-2 form-control @error('imgSrc') is-invalid @enderror"
                               name="imgSrc" required autocomplete="imgSrc" autofocus value="{{ $work_sample->img_src }}">
                        @error('imgSrc')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="link" class="form-label text-light">
                            لینک
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="link" type="text" class="py-2 form-control @error('link') is-invalid @enderror"
                               name="link" required autocomplete="link" autofocus value="{{ $work_sample->url_address }}">
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="development" class="form-label text-light">
                            ابزار توسعه
                            <span class="red fw-semibold">*</span>
                        </label>
                        <select name="development[]" id="development"
                                class="py-2 form-select @error('development') is-invalid @enderror" multiple size="5">
                            @foreach($developments as $development)
                                <option value="{{ $development->id }}" @if(in_array($development->name,$work_sample->developments()->pluck("name")->toArray())) selected @endif>{{ $development->name }}</option>
                            @endforeach
                        </select>
                        @error('development')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="border-0 bg1 rounded-3 text-white py-2 px-4">ویرایش</button>
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
