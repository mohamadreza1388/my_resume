@extends("layouts.master_no_menu")

@section("meta")
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("content")
    <div class="container mx-auto flex justify-center items-center h-[100vh]">
        <div
            class="bg-white shadow-lg rounded-[20px] dark:bg-[#3F3F46] w-full h-[95vh] pt-[90px] relative overflow-auto">
            @include("admin.partials.header")
            <form action="{{ route("admin.skills.update", $skill->id) }}" method="post" class="w-full max-w-[500px] mx-auto">
                @csrf
                @method('PUT')
                    <div class="flex justify-center items-start gap-2 flex-col">
                        <label for="title" class="inline-block dark:text-white">عنوان:</label>
                        <input type="text" name="title" id="title"
                               class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3" value="{{ $skill->title }}">
                    </div>
                    <div class="flex justify-center items-start gap-2 flex-col mt-4">
                        <label for="value" class="inline-block dark:text-white">مقدار:</label>
                        <input type="text" name="value" id="value"
                               class="w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3" value="{{ $skill->value }}">
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
