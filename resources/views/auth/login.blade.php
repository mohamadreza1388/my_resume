@extends("layouts.master_no_menu")

@section("content")
    <section class="login w-full h-[100vh] flex justify-center items-center">
        <div
            class="box rounded-[20px] bg-white shadow-lg dark:bg-[#2C2C30] w-full max-w-[450px] p-4 flex flex-col items-center">
            <h1 class="text-black text-[35px] font-bold font-[morabba] m-0 dark:text-white">ورود</h1>
            <form action="{{ route("login") }}" method="post" class="w-full">
                @csrf
                <label for="email" class="mt-5 inline-block dark:text-white">ایمیل</label>
                <input type="email" name="email" id="email"
                       class="mt-1 w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3"
                       dir="ltr">

                <label for="password" class="mt-5 inline-block dark:text-white">رمزعبور</label>
                <input type="password" name="password" id="password"
                       class="mt-1 w-full h-[50px] rounded-[15px] border outline-0 bg-green-50 dark:bg-gray-800 dark:border-gray-700 dark:text-white p-3">

                <input id="remember_me" type="checkbox"
                       class="hidden"
                       name="remember" checked>

                <button type="submit"
                        class="bg-green-500 w-full flex justify-center items-center text-[17px] p-3 rounded-[15px] hover:shadow-green-500 hover:shadow-s text-white mt-5">
                    ورود
                </button>
            </form>
        </div>
    </section>
@endsection
