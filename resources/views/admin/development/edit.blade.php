@extends("admin.layouts.singlePage")
@section("title","dashboard")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section("content")
    <main class="tab shadow p-3 overflow-auto d-block">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <form method="post" action="{{ route("development-post-edit",$development->id) }}">
                    @csrf
                    @method("put")

                    <div class="mb-4">
                        <label for="name" class="form-label text-light">
                            نام
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="name" type="text" class="py-2 form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $development->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="d-flex w-100 gap-3 justify-content-center align-items-center mb-4">
                        <div class="data-item rounded-3 bg3 p-2 d-flex justify-content-center align-items-center gap-2 w-50">
                            ایجاد شده در :
                            {{ $development->created_at }}
                        </div>
                        <div class="data-item rounded-3 bg3 p-2 d-flex justify-content-center align-items-center gap-2 w-50">
                            اخرین تغییر در :
                            {{ $development->updated_at }}
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
