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
                <div class="flex flex-col gap-4">
                    @foreach($skills as $skill)
                        <div class="p-3 border rounded-[15px] w-full dark:border-gray-500 items-center min-h-[60px] flex justify-between">
                            <div class="flex justify-start gap-10">
                                <div class="font-bold flex justify-center items-center">{{ $skill->id }}</div>
                                <div class="font-bold font-[morabba] min-w-[150px] flex justify-center items-center">{{ $skill->title }}</div>
                                <div class="font-bold min-w-[50px] flex justify-center items-center">{{ $skill->value }}%</div>
                            </div>
                            <div class="flex justify-center items-center gap-2 flex-row-reverse">
                                <form action="{{ route("admin.skills.destroy", $skill->id) }}" method="post">
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
            </div>
        </div>
    </div>
@endsection
