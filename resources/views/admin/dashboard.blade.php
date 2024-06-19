@extends("admin.layouts.master")
@section("title","dashboard")
@section("content")
    <section tab_name="home" class="home tab shadow p-3 overflow-auto">
        <div class="card-wrapper w-100 d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
            <div
                class="card rounded-4 border-0 position-relative overflow-hidden shadow px-3 py-2 d-flex flex-column justify-content-center align-items-start gap-1">
                <i class="fas position-absolute fa-user bg-icon"></i>
                <h4 class="fw-semibold text-white mb-0">کاربران :</h4>
                <h5 class="mt-2 mb-2 text-white"> {{ $userCount }} کاربر </h5>
            </div>
            <div
                class="card rounded-4 border-0 position-relative overflow-hidden shadow px-3 py-2 d-flex flex-column justify-content-center align-items-start gap-1">
                <i class="fas position-absolute fa-hammer bg-icon"></i>
                <h4 class="fw-semibold text-white mb-0">مهارت ها :</h4>
                <h5 class="mt-2 mb-2 text-white"> {{ $skillsCount }} مهارت </h5>
            </div>
            <div
                class="card rounded-4 border-0 position-relative overflow-hidden shadow px-3 py-2 d-flex flex-column justify-content-center align-items-start gap-1">
                <i class="fas position-absolute fa-phone bg-icon"></i>
                <h4 class="fw-semibold text-white mb-0">راه های ارتباطی :</h4>
                <h5 class="mt-2 mb-2 text-white"> {{ $communicationCount }} راه ارتباطی </h5>
            </div>
            <div
                class="card rounded-4 border-0 position-relative overflow-hidden shadow px-3 py-2 d-flex flex-column justify-content-center align-items-start gap-1">
                <i class="fas position-absolute fa-bag-shopping bg-icon"></i>
                <h4 class="fw-semibold text-white mb-0">نمونه کار ها :</h4>
                <h5 class="mt-2 mb-2 text-white"> {{ $workSampleCount }} نمونه کار </h5>
            </div>
        </div>
        <div class="box-wrapper w-100 d-flex justify-content-center align-items-center gap-4 mt-5 flex-wrap">
            <div class="box rounded-4 bg5 px-3 py-2">
                <h5 class="font-m m-0 text-light">امار بازدید</h5>
                <hr noshade class="text-secondary">
                <canvas id="myChart"></canvas>
            </div>
            <div class="box rounded-4 bg5 px-3 py-2">
                <h5 class="font-m m-0 text-light">کاربران جدید</h5>
                <hr noshade class="text-secondary">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </section>
    <section tab_name="users" class="users tab shadow p-3 overflow-auto">
        <header class="d-flex justify-content-between align-items-center flex-row">
            <a href="{{ route("user-create") }}"
               class="add-btn bg1 text-white d-flex justify-content-center align-items-center">
                <i class="fas fa-plus"></i>
                افزودن کاربر جدید
            </a>
            <div class="rounded-3 p-2 bg1 time d-flex justify-content-center align-items-center text-white fs-5"></div>
        </header>
        <hr noshade class="text-secondary">
        <div class="users-wrapper">
            @foreach($users as $user)
                <div class="user-record bg5 w-100 p-1">
                    <div class="avatar-wrapper h-100 d-flex justify-content-start align-items-center gap-2">
                        <h5 class="m-0 text-light mx-1">{{ $user->id }}</h5>
                        <img src="{{ asset($user->avatar) }}" alt="avatar" class="avatar-record h-100">
                        <span
                            class="full-name ms-2 text-light d-flex justify-content-start align-items-center overflow-x-auto overflow-y-hidden text-nowrap">{{ $user->fullname() }}</span>
                        <span
                            class="email ms-2 text-light d-flex justify-content-start align-items-center overflow-x-auto overflow-y-hidden text-nowrap">{{ $user->email }}</span>
                        @if($user->email_verified_at === null)
                            <i class="fas fa-warning text-warning fs-5" data-bs-toggle="tooltip"
                               data-bs-title="تایید نشده"></i>
                        @else
                            <i class="fas fa-check-circle color1 fs-5" data-bs-toggle="tooltip"
                               data-bs-title="تایید شده"></i>
                        @endif
                        <span
                            class="role ms-2 text-light d-flex justify-content-start align-items-center overflow-x-auto overflow-y-hidden text-nowrap">{{$user->userRole()}}</span>
                        <div
                            class="btn-wrapper h-100 float-end d-flex justify-content-end align-items-center flex-row-reverse gap-1">
                            @if($user->role()->first()->title == "admin")
                                <form action="" method="post"
                                      class="h-100 d-flex justify-content-center align-items-center m-0">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center"
                                            disabled>حذف کاربر
                                    </button>
                                </form>
                            @else
                                <form action="{{ route("user-delete",$user->id) }}" method="post"
                                      class="h-100 d-flex justify-content-center align-items-center m-0">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center">
                                        حذف کاربر
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route("user-edit",$user->id) }}"
                               class="btn btn-success edit-btn p-0 d-flex justify-content-center align-items-center">
                                ویرایش کاربر
                            </a>
                            <button type="submit"
                                    class="btn btn-primary edit-btn p-0 d-flex justify-content-center align-items-center"
                                    onclick="window.open('{{ route("view-account",$user->id) }}','test','toolbar=0,menubar=0')">
                                ورود به حساب
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section tab_name="skills" class="skills tab shadow p-3 overflow-auto">
        <header class="d-flex justify-content-between align-items-center flex-row">
            <a href="/admin/skill/create"
               class="add-btn bg1 text-white d-flex justify-content-center align-items-center">
                <i class="fas fa-plus"></i>
                افزودن مهارت جدید
            </a>
            <div class="rounded-3 p-2 bg1 time d-flex justify-content-center align-items-center text-white fs-5"></div>
        </header>
        <hr noshade class="text-secondary">
        <div class="skills-wrapper">
            @foreach($skills as $skill)
                <div class="skill-record bg5 w-100 p-1">
                    <div class="avatar-wrapper h-100 d-flex justify-content-start align-items-center gap-3">
                        <h5 class="mx-1 my-0 text-light">{{ $skill->id }}</h5>
                        <h5 class="my-0 w-costume text-light">عنوان : {{ $skill->title }}</h5>
                        <h5 class="my-0 w-costume text-light">حداکثر مقدار : {{ $skill->max }}</h5>
                        <h5 class="my-0 w-costume text-light">مقدار : {{ $skill->value }}</h5>
                        <div class="btn-wrapper h-100 float-end d-flex justify-content-end align-items-center flex-row-reverse gap-1">
                            <form action="{{ route("skill-delete",$skill->id) }}" method="post"
                                  class="h-100 d-flex justify-content-center align-items-center m-0">
                                @csrf
                                <button type="submit"
                                        class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center">
                                    حذف مهارت
                                </button>
                            </form>
                            <a href="{{ route("skill-edit",$skill->id) }}"
                               class="btn btn-success edit-btn p-0 d-flex justify-content-center align-items-center">
                                ویرایش مهارت
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section tab_name="ways_communication" class="ways_communication tab shadow p-3 overflow-auto">
        <header class="d-flex justify-content-between align-items-center flex-row">
            <a href="/admin/way_communication/create"
               class="add-btn bg1 text-white d-flex justify-content-center align-items-center">
                <i class="fas fa-plus"></i>
                افزودن راه ارتباطی
            </a>
            <div class="rounded-3 p-2 bg1 time d-flex justify-content-center align-items-center text-white fs-5"></div>
        </header>
        <hr noshade class="text-secondary">
        <div class="skills-wrapper">
            @foreach($ways_communication as $way_communication)
                <div class="ways_communication-record bg5 w-100 p-1">
                    <div class="avatar-wrapper h-100 d-flex justify-content-start align-items-center gap-3 flex-wrap">
                        <h5 class="mx-1 my-0 text-light text-nowrap overflow-x-auto overflow-y-hidden">{{ $way_communication->id }}</h5>
                        <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">عنوان : {{ $way_communication->title }}</h5>
                        @if($way_communication->tooltip == null)
                        @else
                            <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">تولتیپ : {{ $way_communication->tooltip }}</h5>
                        @endif
                        <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">ادرس عکس : {{ $way_communication->img_src }}</h5>
                        @if($way_communication->font_icon_class == null)
                        @else
                            <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">فونت ایکون : {{ $way_communication->font_icon_class }}</h5>
                        @endif
                        @if($way_communication->at == null)
                        @else
                            <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">داخل  : {{ $way_communication->at }}</h5>
                        @endif
                        <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">ادرس لینک : {{ $way_communication->link()->first()->link }}</h5>
                        <h5 class="my-0 w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">نام پلتفرم : {{ $way_communication->platform_name }}</h5>
                        <div class="btn-wrapper h-100 float-end d-flex justify-content-end align-items-center flex-row-reverse gap-1">
                            <form action="{{ route("way_communication-delete",$way_communication->id) }}" method="post"
                                  class="h-100 d-flex justify-content-center align-items-center m-0">
                                @csrf
                                <button type="submit"
                                        class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center">
                                    حذف
                                </button>
                            </form>
                            <a href="{{ route("way_communication-edit",$way_communication->id) }}"
                               class="btn btn-success edit-btn p-0 d-flex justify-content-center align-items-center">
                                ویرایش
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section tab_name="links" class="links tab shadow p-3 overflow-auto">
        <header class="d-flex justify-content-between align-items-center flex-row">
            <a href="/admin/link/create"
               class="add-btn bg1 text-white d-flex justify-content-center align-items-center">
                <i class="fas fa-plus"></i>
                افزودن لینک
            </a>
            <div class="rounded-3 p-2 bg1 time d-flex justify-content-center align-items-center text-white fs-5"></div>
        </header>
        <hr noshade class="text-secondary">
        <div class="skills-wrapper">
            @foreach($links as $link)
                <div class="link-record bg5 w-100 p-1">
                    <div class="avatar-wrapper h-100 d-flex justify-content-start align-items-center gap-3 flex-wrap">
                        <h5 class="mx-1 my-0 text-light text-nowrap overflow-x-auto overflow-y-hidden">{{ $link->id }}</h5>
                        <h5 class="my-0  w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">عنوان : {{ $link->title }}</h5>
                        <h5 class="my-0 text-light text-nowrap overflow-x-auto overflow-y-hidden">لینک : {{ $link->link }}</h5>
                        <div class="btn-wrapper h-100 float-end d-flex justify-content-end align-items-center flex-row-reverse gap-1">
                            <form action="{{ route("link-delete",$link->id) }}" method="post"
                                  class="h-100 d-flex justify-content-center align-items-center m-0">
                                @csrf
                                <button type="submit"
                                        class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center">
                                    حذف
                                </button>
                            </form>
                            <a href="{{ route("link-edit",$link->id) }}"
                               class="btn btn-success edit-btn p-0 d-flex justify-content-center align-items-center">
                                ویرایش
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section tab_name="developments" class="links tab shadow p-3 overflow-auto">
        <header class="d-flex justify-content-between align-items-center flex-row">
            <a href="/admin/development/create"
               class="add-btn bg1 text-white d-flex justify-content-center align-items-center">
                <i class="fas fa-plus"></i>
                افزودن ابزار توسعه
            </a>
            <div class="rounded-3 p-2 bg1 time d-flex justify-content-center align-items-center text-white fs-5"></div>
        </header>
        <hr noshade class="text-secondary">
        <div class="skills-wrapper">
            @foreach($developments as $development)
                <div class="development-record bg5 w-100 p-1">
                    <div class="avatar-wrapper h-100 d-flex justify-content-start align-items-center gap-3 flex-wrap">
                        <h5 class="mx-1 my-0 text-light text-nowrap overflow-x-auto overflow-y-hidden">{{ $development->id }}</h5>
                        <h5 class="my-0  w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">عنوان : {{ $development->name }}</h5>
                        <div class="btn-wrapper h-100 float-end d-flex justify-content-end align-items-center flex-row-reverse gap-1">
                            <form action="{{ route("development-delete",$development->id) }}" method="post"
                                  class="h-100 d-flex justify-content-center align-items-center m-0">
                                @csrf
                                <button type="submit"
                                        class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center">
                                    حذف
                                </button>
                            </form>
                            <a href="{{ route("development-edit",$development->id) }}"
                               class="btn btn-success edit-btn p-0 d-flex justify-content-center align-items-center">
                                ویرایش
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section tab_name="work_samples" class="links tab shadow p-3 overflow-auto">
        <header class="d-flex justify-content-between align-items-center flex-row">
            <a href="/admin/work_sample/create"
               class="add-btn bg1 text-white d-flex justify-content-center align-items-center">
                <i class="fas fa-plus"></i>
                افزودن نمونه کار
            </a>
            <div class="rounded-3 p-2 bg1 time d-flex justify-content-center align-items-center text-white fs-5"></div>
        </header>
        <hr noshade class="text-secondary">
        <div class="skills-wrapper">
            @foreach($workSamples as $workSample)
                <div class="development-record bg5 w-100 p-1">
                    <div class="avatar-wrapper h-100 d-flex justify-content-start align-items-center gap-3 flex-wrap">
                        <h5 class="mx-1 my-0 text-light text-nowrap overflow-x-auto overflow-y-hidden">{{ $workSample->id }}</h5>
                        <h5 class="my-0  w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">عنوان : {{ $workSample->work_title }}</h5>
                        <h5 class="my-0  w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">ادرس عکس : {{ $workSample->img_src }}</h5>
                        <h5 class="my-0  w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">لینک : {{ $workSample->url_address }}</h5>
                        <h5 class="my-0  w-costume text-light text-nowrap overflow-x-auto overflow-y-hidden">زیر عنوان : {{ $workSample->information_title }}</h5>
                        <div class="btn-wrapper h-100 float-end d-flex justify-content-end align-items-center flex-row-reverse gap-1">
                            <form action="{{ route("work_sample-delete",$workSample->id) }}" method="post"
                                  class="h-100 d-flex justify-content-center align-items-center m-0">
                                @csrf
                                <button type="submit"
                                        class="btn btn-danger delete-btn p-0 d-flex justify-content-center align-items-center">
                                    حذف
                                </button>
                            </form>
                            <a href="{{ route("work_sample-edit",$workSample->id) }}"
                               class="btn btn-success edit-btn p-0 d-flex justify-content-center align-items-center">
                                ویرایش
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section tab_name="settings" class="links tab shadow p-3 overflow-auto">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center">
            <form action="{{ route("name") }}" method="post" class="text-center d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
                @csrf
                <textarea name="name" required id="name" rows="2" class="form-control w-800px text-light">{{ $name }}</textarea>
                <div>
                    <h5 class="text-light">نام :</h5>
                    <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                </div>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center">
            <form action="{{ route("description") }}" method="post" class="text-center d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
                @csrf
                <textarea name="description" required id="description" rows="2" class="form-control w-800px text-light">{{ $description }}</textarea>
                <div>
                    <h5 class="text-light">توضیحات :</h5>
                    <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                </div>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center">
            <form action="{{ route("about") }}" method="post" class="text-center d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
                @csrf
                <textarea name="about_text" required id="about_text" rows="5" class="form-control w-800px text-light">{{ $about_text }}</textarea>
                <div>
                    <h5 class="text-light">درباره من :</h5>
                    <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                </div>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center">
            <form action="{{ route("copy_right") }}" method="post" class="text-center d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
                @csrf
                <textarea name="copy_right" required id="copy_right" rows="2" class="form-control w-800px text-light">{{ $copy_right }}</textarea>
                <div>
                    <h5 class="text-light">کپی رایت :</h5>
                    <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                </div>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center">
            <form action="{{ route("main_left_img") }}" method="post" class="text-center d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
                @csrf
                <textarea name="img_address" required id="img_address" rows="2" class="form-control w-800px text-light text-end">{{ $img_address }}</textarea>
                <div>
                    <h5 class="text-light">عکس صفحه :</h5>
                    <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                </div>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center">
            <form action="{{ route("resume_address") }}" method="post" class="text-center d-flex justify-content-center align-items-center gap-3 flex-row-reverse">
                @csrf
                <textarea name="resume_address" required id="resume_address" rows="2" class="form-control w-800px text-light text-end">{{ $resume_address }}</textarea>
                <div>
                    <h5 class="text-light">فایل رزومه :</h5>
                    <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                </div>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center flex-column">
            <div class="alert alert-success px-5 fs-6" role="alert">پیش ادرس فایل ها : <span dir="ltr">user_file/</span></div>
            <form action="{{ route('add_user_file') }}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary">ثبت فایل</button>
                <input type="file" name="file" id="user_file" class="file_inp d-none @error('file') is-invalid @enderror" required>
                <label for="user_file" class="btn btn-outline-danger">انتخاب فایل یا عکس</label>
                @error('file')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="text-danger file_name"></span>
            </form>
        </div>
        <hr noshade class="text-secondary">
        <div class="mb3 w-100 d-flex justify-content-center align-items-center flex-column">
            <div class="alert alert-success px-5 fs-6" role="alert">این لیست,لیست فایل های داخل پوشه user_file است .</div>
            <div class="alert alert-primary px-5 fs-6" role="alert">
                @foreach($fileNames as $fileName)
                    <ul class="m-0 p-0" dir="ltr">
                        <li>{{ $fileName }}</li>
                    </ul>
                @endforeach
            </div>

        </div>
    </section>
@endsection

@section("script_before")
    <script>
        var bg_dark = [{img_src: ""}];
        var bg_light = [null, {img_src: ""}];
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section("script_after")
    <script>
        function chart() {
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        "امروز",
                        "دیروز",
                        "2 روز پیش",
                        "3 روز پیش",
                        "4 روز پیش",
                        "5 روز پیش",
                        "6 روز پیش",
                        "7 روز پیش",
                        "8 روز پیش",
                        "9 روز پیش",
                        "10 روز پیش",
                    ],
                    datasets: [{
                        label: 'بازدید ها',
                        data: [
                            @foreach($visit_status as $data)
                                "{{ $data }}",
                            @endforeach
                        ],
                        fill: false,
                        borderColor: 'rgba(34, 197, 94, 1)',
                        tension: 0.1,
                        borderWidth: 4,
                        pointBorderWidth: 8
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    family: "iranyekan"
                                }
                            }
                        }
                    }
                }
            });
        }
        chart()
        function chart2() {
            const ctx = document.getElementById('myChart2');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        "امروز",
                        "دیروز",
                        "2 روز پیش",
                        "3 روز پیش",
                        "4 روز پیش",
                        "5 روز پیش",
                        "6 روز پیش",
                        "7 روز پیش",
                        "8 روز پیش",
                        "9 روز پیش",
                        "10 روز پیش",
                    ],
                    datasets: [{
                        label: 'ثبت نام ها',
                        data: [
                            @foreach($user_status as $data2)
                                "{{ $data2 }}",
                            @endforeach
                        ],
                        fill: false,
                        borderColor: 'rgba(34, 197, 94, 1)',
                        tension: 0.1,
                        borderWidth: 4,
                        pointBorderWidth: 8
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    family: "iranyekan"
                                }
                            }
                        }
                    }
                }
            });
        }
        chart2()
        function updateTime() {
            // استفاده از AJAX برای دریافت تایم به‌روزشده از کنترلر
            $.ajax({
                url: "{{ route('get.time') }}",
                method: 'GET',
                success: function (response) {
                    $('.time').text(response.time);
                }
            });
        }
        setInterval(updateTime, 1000);
    </script>
@endsection
