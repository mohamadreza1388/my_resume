@extends("admin.layouts.singlePage")
@section("title","dashboard")
@section("link")
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/login-register.css') }}">
@endsection
@section("content")
    <main class="tab shadow p-3 overflow-auto d-block">
        <div class="container row d-flex justify-content-center">
            <div class="col-md-7 col-sm-10 col-12">
                <form method="post" action="{{ route("user-post-edit",$user->id) }}">
                    @csrf
                    @method("put")

                    <div class="mb-4">
                        <label for="name" class="form-label text-light">
                            نام
                            <span class="red fw-semibold">*</span>
                        </label>
                        <input id="name" type="text" class="py-2 form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
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
                        <input id="last_name" type="text"
                               class="py-2 form-control @error('last_name') is-invalid @enderror"
                               name="last_name" value="{{ $user->last_name }}" autocomplete="last_name">
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
                               name="email" value="{{ $user->email }}" required autocomplete="email">
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
                                <option value="{{ $gender->id }}"
                                        @if($gender->id === $user->gender_id) selected @endif >{{ $gender->title }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="d-flex w-100 gap-3 justify-content-center align-items-center mb-4">
                        <div class="data-item rounded-3 bg3 p-2 d-flex justify-content-center align-items-center gap-2 w-50">
                            ایجاد شده در :
                            {{ $user->created_at }}
                        </div>
                        <div class="data-item rounded-3 bg3 p-2 d-flex justify-content-center align-items-center gap-2 w-50">
                            اخرین تغییر در :
                            {{ $user->updated_at }}
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
