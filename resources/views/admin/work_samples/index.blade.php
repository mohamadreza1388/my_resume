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
                <h1 class="text-center text-[30px] font-bold font-[morabba] dark:text-white mb-2">مهارت ها</h1>
                <div class="flex flex-col gap-4 pb-4">
                    @foreach($work_samples as $work_sample)
                        <div class="p-3 border rounded-[15px] w-full dark:border-gray-500 items-center min-h-[60px] flex justify-between">
                            <div class="flex justify-start gap-10">
                                <div class="font-bold flex justify-center items-center dark:text-white">{{ $work_sample->id }}</div>
                                <div class="font-bold flex justify-center items-center dark:text-white">{{ $work_sample->title }}</div>
                                <div class="font-bold flex justify-center items-center dark:text-white">{{ $work_sample->description }}</div>
                                <div class="font-bold flex justify-center items-center dark:text-white">
                                    <img src="{{ asset($work_sample->thumbnail) }}" alt="" class="h-[50px]" loading="lazy">
                                </div>
                                <div class="font-bold flex justify-center items-center dark:text-white">{{ $work_sample->url }}</div>
                            </div>
                            <div class="flex justify-center items-center gap-2 flex-row-reverse">
                                <form action="{{ route("admin.work_samples.destroy", $work_sample->id) }}" method="post" onclick="return confirm('از کار خود مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-[10px] px-4 py-3 bg-red-600 text-white">
                                        حذف
                                    </button>
                                </form>
                                <form action="{{ route("admin.work_samples.edit", $work_sample->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="rounded-[10px] px-4 py-3 bg-green-600 text-white">
                                        ویرایش
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="opacity-50 border-0 outline-0 bg-gray-500 h-[1px]">
                <div class="mb-5">
                    <h1 class="text-center text-[30px] font-bold font-[morabba] dark:text-white mb-2 mt-3">ایجاد</h1>
                    <form action="{{ route("admin.work_samples.store") }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2 gap-10 mt-4">
                            <div class="flex justify-center items-start flex-col gap-2">
                                <label for="title" class="inline-block dark:text-white">عنوان:</label>
                                <input type="text" name="title" id="title"
                                       class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">
                            </div>
                            <div class="flex justify-center items-start flex-col gap-2">
                                <label for="description" class="inline-block dark:text-white">توضیحات:</label>
                                <input type="text" name="description" id="description"
                                       class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-10 mt-4">
                            <div class="flex justify-center items-start flex-col gap-2">
                                <label for="thumbnail" class="inline-block dark:text-white">تصویر:</label>
                                <input type="text" name="thumbnail" id="thumbnail"
                                       class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">
                            </div>
                            <div class="flex justify-center items-start flex-col gap-2">
                                <label for="url" class="inline-block dark:text-white">ادرس:</label>
                                <input type="text" name="url" id="url"
                                       class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">
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
        </div>
    </div>
@endsection
