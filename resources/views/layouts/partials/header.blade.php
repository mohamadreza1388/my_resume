<div class="header_wrapper fixed top-6 right-0 w-full z-50">
    <div class="container mx-auto max-w-[95%]">
        <header class="header w-full backdrop-blur border border-neutral-200/50 bg-gray-400/60 h-[90px] rounded-[20px] flex px-8 sm:px-10">
            <div class="grow flex justify-start">
                @auth()
                    <form method="get" action="{{ route("admin.setting") }}" class="flex items-center">
                        <button type="submit" class="profile">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" xml:space="preserve" class="w-10">
            <path id="path7" fill="#ffffff" stroke="none"
                  d="M8 .986A7.022 7.022 0 0 0 .986 8c0 1.874.73 3.635 2.055 4.959A6.965 6.965 0 0 0 8 15.014 7.022 7.022 0 0 0 15.014 8 7.022 7.022 0 0 0 8 .986zm0 1A6.021 6.021 0 0 1 14.014 8a5.984 5.984 0 0 1-1.606 4.074 5.836 5.836 0 0 0-2.564-1.754 2.999 2.999 0 0 0 1.11-2.326A2.997 2.997 0 0 0 7.94 5.006a2.997 2.997 0 0 0-2.988 3.012c0 .929.436 1.75 1.104 2.298a5.846 5.846 0 0 0-2.526 1.698A5.964 5.964 0 0 1 1.986 8 6.021 6.021 0 0 1 8 1.986zm-.035 4.02c1.097 0 1.988.892 1.988 2.012A1.988 1.988 0 0 1 8.03 10c-.029 0-.057-.006-.086-.006-.025 0-.049.005-.074.006a1.994 1.994 0 0 1-1.916-2.006c0-1.096.892-1.988 2.012-1.988zm-.096 4.992c.024.001.048.008.072.008h.024c.022 0 .04-.007.062-.008a4.84 4.84 0 0 1 3.643 1.752A5.963 5.963 0 0 1 8 14.014a5.965 5.965 0 0 1-3.742-1.31 4.848 4.848 0 0 1 3.611-1.706z">
            </path>
        </svg>
                        </button>
                    </form>
                @else
                    <form method="get" action="{{ route("login") }}" class="flex items-center">
                        <button type="submit" class="profile">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" xml:space="preserve" class="w-10">
            <path id="path7" fill="#ffffff" stroke="none"
                  d="M8 .986A7.022 7.022 0 0 0 .986 8c0 1.874.73 3.635 2.055 4.959A6.965 6.965 0 0 0 8 15.014 7.022 7.022 0 0 0 15.014 8 7.022 7.022 0 0 0 8 .986zm0 1A6.021 6.021 0 0 1 14.014 8a5.984 5.984 0 0 1-1.606 4.074 5.836 5.836 0 0 0-2.564-1.754 2.999 2.999 0 0 0 1.11-2.326A2.997 2.997 0 0 0 7.94 5.006a2.997 2.997 0 0 0-2.988 3.012c0 .929.436 1.75 1.104 2.298a5.846 5.846 0 0 0-2.526 1.698A5.964 5.964 0 0 1 1.986 8 6.021 6.021 0 0 1 8 1.986zm-.035 4.02c1.097 0 1.988.892 1.988 2.012A1.988 1.988 0 0 1 8.03 10c-.029 0-.057-.006-.086-.006-.025 0-.049.005-.074.006a1.994 1.994 0 0 1-1.916-2.006c0-1.096.892-1.988 2.012-1.988zm-.096 4.992c.024.001.048.008.072.008h.024c.022 0 .04-.007.062-.008a4.84 4.84 0 0 1 3.643 1.752A5.963 5.963 0 0 1 8 14.014a5.965 5.965 0 0 1-3.742-1.31 4.848 4.848 0 0 1 3.611-1.706z">
            </path>
        </svg>
                        </button>
                    </form>
                @endauth
            </div>
            <div class="grow-[1.8] flex justify-center items-center">
                <ul class="flex justify-center items-center sm:gap-10 gap-6">
                    <li>
                        <a href="#main" class="sm:inline-block hidden text-white text-[17px] sm:text-[20px] before:inline-block before:absolute relative before:w-full before:h-[3px] before:bottom-[-4px] before:bg-transparent hover:before:bg-green-500 before:transition-all before:duration-200 before:rounded">درباره من</a>
                    </li>
                    <li>
                        <a href="#skills" class="text-white text-[17px] sm:text-[20px] before:inline-block before:absolute relative before:w-full before:h-[3px] before:bottom-[-4px] before:bg-transparent hover:before:bg-green-500 before:transition-all before:duration-200 before:rounded">مهارت ها</a>
                    </li>
                    <li>
                        <a href="#work-samples" class="text-white text-[17px] sm:text-[20px] before:inline-block before:absolute relative before:w-full before:h-[3px] before:bottom-[-4px] before:bg-transparent hover:before:bg-green-500 before:transition-all before:duration-200 before:rounded">نمونه کارها</a>
                    </li>
                </ul>
            </div>
            <div class="grow flex justify-end items-center">
                <button class="change_theme flex justify-end items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 stroke-white dark:inline-block hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" class="header-navbar"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 stroke-white dark:hidden inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"></path>
                    </svg>
                </button>
            </div>
        </header>
    </div>
</div>
