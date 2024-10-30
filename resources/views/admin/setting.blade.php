@extends("layouts.master_no_menu")

@section("meta")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("content")
    <div class="container mx-auto flex justify-center items-center h-[100vh]">
        <div
            class="bg-white shadow-lg rounded-[20px] dark:bg-[#3F3F46] w-full h-[95vh] pt-[90px] relative overflow-auto">
            <div class="header_wrapper absolute top-0 right-0 w-full z-50">
                <div class="container mx-auto">
                    <header
                        class="header w-full backdrop-blur border border-neutral-200/50 bg-gray-400/60 h-[75px] rounded-tr-[20px] rounded-tl-[20px] flex px-10">
                        <div class="grow-[1.8] flex justify-start items-center">
                            <ul class="flex justify-center items-center gap-10">
                                <li>
                                    <a href="{{ route("admin.setting") }}"
                                       class="text-white text-[20px] before:inline-block before:absolute relative before:w-full before:h-[3px] before:bottom-[-4px] before:bg-transparent hover:before:bg-green-500 before:transition-all before:duration-200 before:rounded">تنظیمات</a>
                                </li>
                                <li>
                                    <a href="#skills"
                                       class="text-white text-[20px] before:inline-block before:absolute relative before:w-full before:h-[3px] before:bottom-[-4px] before:bg-transparent hover:before:bg-green-500 before:transition-all before:duration-200 before:rounded">مهارت
                                        ها</a>
                                </li>
                                <li>
                                    <a href="#work-samples"
                                       class="text-white text-[20px] before:inline-block before:absolute relative before:w-full before:h-[3px] before:bottom-[-4px] before:bg-transparent hover:before:bg-green-500 before:transition-all before:duration-200 before:rounded">نمونه
                                        کارها</a>
                                </li>
                            </ul>
                        </div>
                        <div class="grow flex justify-end items-center">
                            <button class="change_theme flex justify-end items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-9 stroke-white dark:inline-block hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                          class="header-navbar"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-9 stroke-white dark:hidden inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"></path>
                                </svg>
                            </button>
                        </div>
                    </header>
                </div>
            </div>
            <div class="w-full px-6 mx-auto">
                <h1 class="text-center text-[30px] font-bold font-[morabba] dark:text-white mb-2">تنظیمات</h1>
                <form action="" method="get" class="w-full">
                    <div class="grid grid-cols-2 gap-20">
                        <div class="flex items-center">
                            <label for="name"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">نام:</label>
                            <input type="text" name="name" id="name"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("name") }}">
                        </div>
                        <div class="flex items-center">
                            <label for="job"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">حرفه:</label>
                            <input type="text" name="job" id="job"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("job") }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-20 mt-8">
                        <div class="flex items-center">
                            <label for="resume"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">ادرس
                                رزومه:</label>
                            <input type="text" name="resume" id="resume"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("resume") }}">
                        </div>
                        <div class="flex items-center">
                            <label for="github"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">گیتهاب:</label>
                            <input type="text" name="github" id="github"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("github") }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-20 mt-8">
                        <div class="flex items-center">
                            <label for="instagram"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">اینستاگرام:</label>
                            <input type="text" name="instagram" id="instagram"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("instagram") }}">
                        </div>
                        <div class="flex items-center">
                            <label for="telegram"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">تلگرام:</label>
                            <input type="text" name="telegram" id="telegram"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("telegram") }}">
                        </div>
                        <div class="flex items-center">
                            <label for="email"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">ایمیل:</label>
                            <input type="email" name="email" id="email"
                                   class="grow-[3] mt-1 h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                                   value="{{ setting("email") }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-20 mt-8">
                        <div class="flex items-center">
                            <label for="about"
                                   class="grow-[0.2] dark:text-white flex justify-center items-center text-[17px]">درباره
                                من:</label>
                            <textarea type="text" name="about" rows="5" id="about"
                                      class="mt-1 grow rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">{{ setting("about") }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        // Const
        const elm_form = document.querySelector('form')
        const elm_inputs = document.querySelectorAll("input")
        const elm_textarea = document.querySelector("textarea")

        // Functions
        function debounce(func, delay) {
            let timeoutId;
            return function (...args) {
                if (timeoutId) {
                    clearTimeout(timeoutId);
                }
                timeoutId = setTimeout(() => {
                    func.apply(this, args);
                }, delay);
            };
        }

        const changed = () => {
            const formData = new FormData(elm_form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('admin.setting.set') }}");

            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onload = () => {
                console.log(xhr.responseText);
            };

            xhr.send(formData);
        };


        // Events
        const debouncedChanged = debounce(changed, 1500);

        elm_inputs.forEach((element) => {
            element.addEventListener("input", debouncedChanged);
        });

        elm_textarea.addEventListener("input", debouncedChanged);
    </script>
@endsection
