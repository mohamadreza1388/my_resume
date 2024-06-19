@extends("admin.layouts.singlePage")
@section("title","dashboard")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section("content")
    <main class="tab shadow p-3 overflow-auto d-block">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <form method="post" action="{{ route("skill-post-edit",$skill->id) }}">
                    @csrf
                    @method("put")

                    <div class="mb-4">
                        <label for="title" class="form-label text-light">
                            عنوان
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="title" type="text" class="py-2 form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ $skill->title }}" required autocomplete="title" autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="max" class="form-label text-light">
                            حداکثر مقدار
                        </label>
                        <input id="max" type="text"
                               class="py-2 form-control @error('max') is-invalid @enderror"
                               name="max" value="{{ $skill->max }}" autocomplete="max">
                        @error('max')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="value" class="form-label text-light">
                            مقدار
                        </label>
                        <input id="value" type="text"
                               class="py-2 form-control @error('value') is-invalid @enderror"
                               name="value" value="{{ $skill->value }}" autocomplete="value">
                        @error('value')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="d-flex w-100 gap-3 justify-content-center align-items-center mb-4">
                        <div class="data-item rounded-3 bg3 p-2 d-flex justify-content-center align-items-center gap-2 w-50">
                            ایجاد شده در :
                            {{ $skill->created_at }}
                        </div>
                        <div class="data-item rounded-3 bg3 p-2 d-flex justify-content-center align-items-center gap-2 w-50">
                            اخرین تغییر در :
                            {{ $skill->updated_at }}
                        </div>
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
