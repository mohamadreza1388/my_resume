@extends("layout.master")
@section("title","محمد رضا نصراله زاده")
@section("content")

    <main class="has-bg1 pb-5">
        <div class="my-container row d-flex flex-column-reverse flex-md-row">
            <div
                class="col-md-6 col-12 d-flex justify-content-lg-start justify-content-center flex-column align-items-center">
                <h1 class="text-light name font-m mb-4 text-md-start text-center">{{ $name }}</h1>
                <span class="text-light">{{ $main_description }}</span>
                <div class="item-wrapper d-flex justify-content-start align-items-center gap-4 mt-5">
                    <a class="bg-1 shadow-hover-1 text-white d-flex justify-content-center align-items-center gap-2 bg1 download rounded-5"
                       download="my-resume" href="{{ asset($resume_file) }}">
                        دانلود رزومه
                        <i class="fas fa-download fs-5"></i>
                    </a>
                    @foreach($main_communications as $main_communication)
                        <a class="social-media color-white d-flex justify-content-center align-items-center bg2 shadow-hover-1"
                           data-bs-custom-class="custom-tooltip" data-bs-placement="top"
                           data-bs-title="{{ $main_communication->tooltip }}" data-bs-toggle="tooltip"
                           href="{{ $main_communication->link->link }}">
                            <i class="{{ $main_communication->font_icon_class }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-12 d-flex justify-content-center align-items-start">
                <img alt="code picture" class="main-picture shadow-1"
                     src="{{ asset($main_left_img) }}">
            </div>
        </div>
        <a class="scroll d-flex flex-column justify-content-center align-items-center gap-0" href="#about-me">
            <img alt="scroll icon" src="{{ asset($mouse_img) }}">
            <span class="color-white">{{ $scroll_text }}</span>
        </a>
    </main>
    <section data-aos="fade-up" id="about-me">
        <div class="my-container">
            <h1 class="section-title font-m text-light">{{ $about_me_title }}</h1>
            <div class="content rounded-5 bg4 text-light px-5 py-4 my-5 shadow-1">
                <p class="lh-lg m-0">
                    {!! $paragraph1 !!}
                </p>
            </div>
        </div>
    </section>
    <section class="pb-4 position-relative" data-aos="fade-up" id="skills">
        <div class="my-container">
            <h1 class="section-title font-m text-light">{{ $skills_title }}</h1>
            <div class="content rounded-5 bg4 d-flex justify-content-between align-items-start py-5 flex-wrap px-4">


                @foreach($skills as $skill)
                    <div class="item d-flex flex-column justify-content-center align-items-center gap-1"
                         data-aos="fade-up">
                        <div
                            class="text d-flex justify-content-between align-items-center text-light w-100 flex-row-reverse">
                            <span class="bar-value"></span>
                            <span class="title">{{ $skill->title }}</span>
                        </div>
                        <div class="my-progress" max="{{ $skill->max }}">
                            <div class="bar" value="{{ $skill->value }}"></div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <svg class="position-absolute start-0 bg-svg" preserveAspectRatio="none" viewBox="0 0 500 150">
            <path d="M-23.42,101.16 C145.87,-46.86 279.62,189.97 523.42,9.39 L500.00,150.00 L0.00,150.00 Z"
                  style="stroke: none;"></path>
        </svg>
    </section>
    <section class="mt-5" data-aos="fade-up" id="contact-us">
        <div class="my-container">
            <h1 class="section-title font-m text-light">{{ $contact_us_title }}</h1>
            <div
                class="content rounded-5 bg4 px-5 py-4 my-5 shadow-1 d-flex flex-wrap justify-content-start align-items-center row-gap-4">
                @foreach($way_communications as $way_communication)
                    <div class="social d-flex justify-content-start align-items-center gap-2">
                        <img alt="telegram icon" src="{{ asset($way_communication->img_src) }}">
                        <span class="content text-light" dir="ltr">{{ $way_communication->title }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="mt-5 position-relative pb-5" id="work-samples">
        <div class="my-container">
            <h1 class="section-title font-m text-light">{{ $work_samples_title }}</h1>
            <div
                class="content rounded-5 bg4 px-5 py-4 my-5 shadow-1 d-flex flex-wrap justify-content-center align-items-center gap-3">
                @foreach($work_samples as $work_sample)
                    <a class="sample p-3 bg3 rounded-3 pb-4 text-center position-relative"
                       href="{{ $work_sample->url_address }}">
                        <img alt="image title" class="top-img px-4 mt-4 mb-4"
                             src="{{ asset( $work_sample->img_src ) }}">
                        <span class="title text-light text-center">{{ $work_sample->work_title }}</span>
                        <div
                            class="inf-btn d-flex justify-content-center align-items-center rounded-3 position-absolute"
                            data-bs-placement="top" data-bs-title="دیدن اطلاعات" data-bs-toggle="tooltip">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="information p-3 py-2">
                            <div
                                class="header w-100 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="font-m text-light fs-4">{{ $work_sample->information_title }}</span>
                                <i class="fas fa-close text-light fs-4 close-btn"></i></div>
                            <div
                                class="body text-light d-flex gap-2 flex-column align-items-start justify-content-start pt-3">
                                <span>توسعه داده شده با :</span>
                                <ul class="pr-2 m-0 list">
                                    @foreach($work_sample->developments as $development)
                                        <li class="text-start">{{ $development->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="copy-right mt-5">{{ $copy_right }}</div>
        </div>
        <svg class="position-absolute start-0 bg-svg" preserveAspectRatio="none" viewBox="0 0 500 150">
            <path d="M-23.42,101.16 C145.87,-46.86 279.62,189.97 523.42,9.39 L500.00,150.00 L0.00,150.00 Z"
                  style="stroke: none;"></path>
        </svg>
    </section>
@endsection
@section("script_before")
    <script>
        let bg_dark = {!! $main_bg->where("theme_id","1") !!};
        let bg_light = {!! $main_bg->where("theme_id","2") !!};
    </script>
@endsection
