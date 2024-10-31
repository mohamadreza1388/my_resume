@extends("layouts.master_no_menu")

@section("meta")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("content")
    <div class="container mx-auto flex justify-center items-center h-[100vh]">
        <div
            class="bg-white shadow-lg rounded-[20px] dark:bg-[#3F3F46] w-full h-[95vh] pt-[90px] relative overflow-auto">
            @include("admin.partials.header")
            <form action="{{ route("admin.work_samples.update", $work_sample->id) }}" method="post"
                  class="w-full max-w-[500px] mx-auto">
                @csrf
                @method('PUT')
                <div class="gap-10 mt-4">
                    <div class="flex justify-center items-start flex-col gap-2 mt-4">
                        <label for="title" class="inline-block dark:text-white">عنوان:</label>
                        <input type="text" name="title" id="title"
                               class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3" value="{{ $work_sample->title }}">
                    </div>
                    <div class="flex justify-center items-start flex-col gap-2 mt-4">
                        <label for="description" class="inline-block dark:text-white">توضیحات:</label>
                        <input type="text" name="description" id="description"
                               class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3" value="{{ $work_sample->description }}">
                    </div>
                </div>
                <div class="gap-10 mt-4">
                    <div class="flex justify-center items-start flex-col gap-2 mt-4">
                        <label for="thumbnail" class="inline-block dark:text-white">تصویر:</label>
                        <input type="text" name="thumbnail" id="thumbnail"
                               class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3" value="{{ $work_sample->thumbnail }}">
                    </div>
                    <div class="flex justify-center items-start flex-col gap-2 mt-4">
                        <label for="url" class="inline-block dark:text-white">ادرس:</label>
                        <input type="text" name="url" id="url"
                               class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3" value="{{ $work_sample->url }}">
                    </div>
                </div>
                <div class="flex justify-center items-center gap-2 mt-4">
                    <button type="submit"
                            class="bg-green-500 w-full flex justify-center items-center text-[17px] p-3 rounded-[15px] hover:shadow-green-500 hover:shadow-s text-white">
                        ایجاد
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
