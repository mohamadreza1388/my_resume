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
                        <a href="{{ route("admin.skills.index") }}"
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
