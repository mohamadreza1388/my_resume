@extends("layouts.master_no_menu")

@section("meta")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("content")
    <div class="container mx-auto flex justify-center items-center h-[100vh]">
        <div
            class="bg-white shadow-lg rounded-[20px] dark:bg-[#3F3F46] w-full h-[95vh] pt-[90px] relative overflow-auto">
            @include("admin.partials.header")
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
