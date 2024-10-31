@extends("layouts.master")

@section("content")
    <main id="main" class="w-full h-[607px] bg-no-repeat bg-cover pt-20">
        <div class="container flex justify-center mx-auto h-full">
            <div class="basis-1/2 flex justify-center items-start flex-col">
                <h1 class="font-[morabba] font-bold text-[60px] dark:text-white">{{ setting("name") }}</h1>
                <p class="text-[17px] mt-8 dark:text-white">{{ setting("job") }}</p>
                <div class="flex justify-start items-center gap-3 mt-8">
                    {{--Resume Download--}}
                    <a href="{{ setting("resume") }}"
                       class="bg-green-500 w-40 flex justify-center items-center p-3 rounded-full hover:shadow-green-500 hover:shadow-big text-white"
                       download="mohamadrezanz">
                        دانلود رزومه
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"></path>
                        </svg>
                    </a>
                    {{--Links--}}
                    <a href="{{ setting("email") }}" target="_blank"
                       class="bg-gray-500 hover:bg-green-500 group rounded-full relative hover:shadow-green-500 hover:shadow-big">
                        <div class="bg-white rounded-full m-2.5 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 class="w-full fill-gray-500 p-1 duration-0 group-hover:fill-green-500"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"></path>
                            </svg>
                        </div>
                    </a>
                    <a href="{{ setting("github") }}" target="_blank"
                       class="bg-gray-500 hover:bg-black rounded-full p-1 relative group hover:shadow-black hover:shadow-big">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-11 fill-white" viewBox="0 0 72 72">
                            <path
                                d="M36,12c13.255,0,24,10.745,24,24c0,10.656-6.948,19.685-16.559,22.818c0.003-0.009,0.007-0.022,0.007-0.022	s-1.62-0.759-1.586-2.114c0.038-1.491,0-4.971,0-6.248c0-2.193-1.388-3.747-1.388-3.747s10.884,0.122,10.884-11.491	c0-4.481-2.342-6.812-2.342-6.812s1.23-4.784-0.426-6.812c-1.856-0.2-5.18,1.774-6.6,2.697c0,0-2.25-0.922-5.991-0.922	c-3.742,0-5.991,0.922-5.991,0.922c-1.419-0.922-4.744-2.897-6.6-2.697c-1.656,2.029-0.426,6.812-0.426,6.812	s-2.342,2.332-2.342,6.812c0,11.613,10.884,11.491,10.884,11.491s-1.097,1.239-1.336,3.061c-0.76,0.258-1.877,0.576-2.78,0.576	c-2.362,0-4.159-2.296-4.817-3.358c-0.649-1.048-1.98-1.927-3.221-1.927c-0.817,0-1.216,0.409-1.216,0.876s1.146,0.793,1.902,1.659	c1.594,1.826,1.565,5.933,7.245,5.933c0.617,0,1.876-0.152,2.823-0.279c-0.006,1.293-0.007,2.657,0.013,3.454	c0.034,1.355-1.586,2.114-1.586,2.114s0.004,0.013,0.007,0.022C18.948,55.685,12,46.656,12,36C12,22.745,22.745,12,36,12z">
                            </path>
                        </svg>
                    </a>
                    <a href="{{ setting("telegram") }}" target="_blank"
                       class="bg-gray-500 hover:bg-sky-600 rounded-full p-1 relative group hover:shadow-sky-600 hover:shadow-big">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-11 fill-white">
                            <path
                                d="M32,10c12.15,0,22,9.85,22,22s-9.85,22-22,22s-22-9.85-22-22S19.85,10,32,10z M39.589,40.968	c0.404-1.241,2.301-13.615,2.534-16.054c0.071-0.738-0.163-1.229-0.619-1.449c-0.553-0.265-1.371-0.133-2.322,0.21	c-1.303,0.47-17.958,7.541-18.92,7.951c-0.912,0.388-1.775,0.81-1.775,1.423c0,0.431,0.256,0.673,0.96,0.924	c0.732,0.261,2.577,0.82,3.668,1.121c1.05,0.29,2.243,0.038,2.913-0.378c0.709-0.441,8.901-5.921,9.488-6.402	c0.587-0.48,1.056,0.135,0.576,0.616c-0.48,0.48-6.102,5.937-6.844,6.693c-0.901,0.917-0.262,1.868,0.343,2.249	c0.689,0.435,5.649,3.761,6.396,4.295c0.747,0.534,1.504,0.776,2.198,0.776C38.879,42.942,39.244,42.028,39.589,40.968z">
                            </path>
                        </svg>
                    </a>
                    <a href="{{ setting("instagram") }}" target="_blank"
                       class="bg-gray-500 hover:bg-rose-600 rounded-full p-2 relative group hover:shadow-rose-600 hover:shadow-big">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 fill-white" viewBox="0 0 64 64">
                            <path
                                d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="basis-1/2 flex justify-center items-center">
                <img src="{{ asset(setting("main_picture")) }}" alt="my picture"
                     class="w-[360px] h-[360px] object-cover rounded-[130px] animate-profile" loading="lazy">
            </div>
        </div>
        <div class="w-full transform -translate-y-[150%] flex-col gap-4 justify-center items-center flex">
            <img src="{{ asset("assets/images/Header/mouseDown.png") }}" alt=""
                 class="w-[100px] invert dark:invert-0 animate-bounce">
            <p class="-mt-10 dark:text-white">اسکرول کنید</p>
        </div>
    </main>
    <section id="about_us">
        <div class="container mx-auto pt-16">
            <h1 class="font-[morabba] font-bold text-[40px] text-[#1F2937] before:inline-block relative before:absolute before:bottom-[-5px] before:w-[50%] before:h-[4px] before:bg-green-500 w-fit dark:text-white">
                درباره من</h1>
            <div
                class="w-full bg-white dark:bg-[#3F3F46] dark:text-white rounded-[20px] text-lg p-9 mt-10 leading-9 shadow-lg">{!! setting("about") !!}</div>
        </div>
    </section>
    <section id="skills" class="relative pb-10">
        <div class="container mx-auto pt-16">
            <h1 class="font-[morabba] font-bold text-[40px] text-[#1F2937] before:inline-block relative before:absolute before:bottom-[-5px] before:w-[50%] before:h-[4px] before:bg-green-500 w-fit dark:text-white">
                مهارت ها</h1>
            <div class="bg-white dark:bg-[#3F3F46] shadow-lg w-full p-9 mt-10 rounded-[20px] grid grid-cols-3 gap-16">
                @foreach($skills as $skill)
                    <div>
                        <div class="flex justify-between">
                            <span class="dark:text-white text-black">{{ $skill->title }}</span>
                            <span class="dark:text-white text-black">{{ $skill->value }}%</span>
                        </div>
                        <div class="progress-bar bg-gray-200 dark:bg-zinc-500 rounded-full">
                            <div
                                class="bar bg-green-500 mt-1.5 h-8 flex justify-between items-center rounded-full" style="width: {{$skill->value}}%"></div>
                        </div>
                    </div>
                @endforeach
                <svg class="absolute bottom-0 -z-[1] w-full right-0 fill-green-500" preserveAspectRatio="none"
                     viewBox="0 0 500 150">
                    <path d="M-23.42,101.16 C145.87,-46.86 279.62,189.97 523.42,9.39 L500.00,150.00 L0.00,150.00 Z"
                          style="stroke: none;"></path>
                </svg>
            </div>
        </div>
    </section>
    <section id="work-samples" class="relative pb-10">
        <div class="container mx-auto pt-16">
            <h1 class="font-[morabba] font-bold text-[40px] text-[#1F2937] before:inline-block relative before:absolute before:bottom-[-5px] before:w-[50%] before:h-[4px] before:bg-green-500 w-fit dark:text-white">
                نمونه کارها</h1>
            <div class="bg-white dark:bg-[#3F3F46] shadow-lg w-full p-9 mt-10 rounded-[20px] grid grid-cols-4 gap-6">
                @foreach($work_samples as $work_sample)
                    <a href="{{ $work_sample->url }}"
                       class="work_sample dark:bg-[#2C2C30] bg-gray-100 p-4 py-6 rounded-[20px] w-full relative inline-block">
                        <img src="{{ asset($work_sample->thumbnail) }}" alt="" class="h-[80px] mx-auto">
                        <p class="text-center mt-4 dark:text-white">{{ $work_sample->description }}</p>
{{--                        <button class="code bg-green-500 rounded-[8px] z-20 absolute top-4 right-4 py-1 px-1.5">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"--}}
{{--                                 stroke="currentColor" class="w-5 h-5 text-white">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                      d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"></path>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
                        <div
                            class="information w-full max-w-[450px] rounded-[20px] z-[52] fixed min-h-[200px] top-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2 bg-white dark:bg-[#2C2C30] p-4 hidden opacity-0">
                            <div class="flex justify-between items-center">
                                <h3 class="font-[morabba] text-[22px] dark:text-white">{{ $work_sample->title }}</h3>
                                <svg viewBox="0 0 24 24" fill="none" class="w-5 dark:invert close"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="Menu / Close_LG">
                                            <path id="Vector" d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001"
                                                  stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <hr noshade class="opacity-50 border-0 outline-0 h-[1px] w-full bg-gray-400 my-3">
                            <sapn class="text-gray-700 dark:text-white">توسعه داده شده با:</sapn>
                            <ul class="mt-2">
                                @foreach($work_sample->informations as $information)
                                    <li class="before:inline-block before:w-[8px] before:h-[8px] before:ml-2 dark:text-white before:rounded-full before:bg-green-500">
                                        {{ $information->title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <svg class="absolute bottom-0 -z-[1] w-full right-0 fill-green-500 h-[60%]" preserveAspectRatio="none"
             viewBox="0 0 500 150">
            <path d="M-23.42,101.16 C145.87,-46.86 279.62,189.97 523.42,9.39 L500.00,150.00 L0.00,150.00 Z"
                  style="stroke: none;"></path>
        </svg>
    </section>
@endsection
