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
                    @foreach($skills as $skill)
                        <div class="p-3 border rounded-[15px] w-full dark:border-gray-500 items-center min-h-[60px] flex justify-between">
                            <div class="flex justify-start gap-10">
                                <div class="font-bold flex justify-center items-center dark:text-white">{{ $skill->id }}</div>
                                <div class="font-bold font-[morabba] min-w-[150px] flex justify-center items-center dark:text-white">{{ $skill->title }}</div>
                                <div class="font-bold min-w-[50px] flex justify-center items-center dark:text-white">{{ $skill->value }}%</div>
                            </div>
                            <div class="flex justify-center items-center gap-2 flex-row-reverse">
                                <form action="{{ route("admin.skills.destroy", $skill->id) }}" method="post" onclick="return confirm('از کار خود مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-[10px] px-4 py-3 bg-red-600 text-white">
                                        حذف
                                    </button>
                                </form>
                                <form action="{{ route("admin.skills.edit", $skill->id) }}" method="get">
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
                    <form action="{{ route("admin.skills.store") }}" method="post">
                        @csrf
                        <div class="grid grid-cols-3 gap-10 mt-4">
                            <div class="flex justify-center items-center gap-2">
                                <label for="title" class="inline-block dark:text-white">عنوان:</label>
                                <input type="text" name="title" id="title"
                                       class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">
                            </div>
                            <div class="flex justify-center items-center gap-2">
                                <label for="value" class="inline-block dark:text-white">مقدار:</label>
                                <input type="text" name="value" id="value"
                                       class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">
                            </div>
                            <div class="flex justify-center items-center gap-2">
                                <button type="submit"
                                        class="bg-green-500 w-full flex justify-center items-center text-[17px] p-3 rounded-[15px] hover:shadow-green-500 hover:shadow-s text-white">
                                    ایجاد
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
