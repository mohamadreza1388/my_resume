<header class="top-header position-fixed w-100">
    <div class="my-container">
        <div class="header-content border border-1 w-100 mt-3 rounded-4 px-md-5 px-4">
            <div class="content d-flex justify-content-between align-items-center w-100">
                <div class="bars-icon text-light fs-2 d-flex flex-column justify-content-between d-md-none">
                    <div class="w-100 bg-light rounded-5"></div>
                    <div class="w-100 bg-light rounded-5"></div>
                    <div class="w-100 bg-light rounded-5"></div>
                </div>
                <a class="logo" href="/"><img class="w-100" src="{{ asset($logo1) }}" alt="logo"></a>
                <nav class="top-navigation d-md-block d-none">
                    <ul class="p-0 m-0 d-flex justify-content-center align-items-center gap-5">
                        @foreach($menu_items as $menu_item)
                            <li><a class="text-white fs-5"
                                   href="{{ $menu_item->url_address }}">{{ $menu_item->title }}</a></li>
                        @endforeach
                    </ul>
                </nav>
                <div class="header-item-wrapper d-flex justify-content-center align-items-center gap-3">
                    <div class="light-dark">
                        <svg data="light" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"></path>
                        </svg>
                        <svg data="dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"></path>
                        </svg>
                    </div>


                    <div class="user-icon">


                        @guest()
                            <a href="/login" class="f-out-0" title="ورود/ثبت نام">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" xml:space="preserve">
                                <path id="path7" fill="#ffffff" stroke="none"
                                      d="M8 .986A7.022 7.022 0 0 0 .986 8c0 1.874.73 3.635 2.055 4.959A6.965 6.965 0 0 0 8 15.014 7.022 7.022 0 0 0 15.014 8 7.022 7.022 0 0 0 8 .986zm0 1A6.021 6.021 0 0 1 14.014 8a5.984 5.984 0 0 1-1.606 4.074 5.836 5.836 0 0 0-2.564-1.754 2.999 2.999 0 0 0 1.11-2.326A2.997 2.997 0 0 0 7.94 5.006a2.997 2.997 0 0 0-2.988 3.012c0 .929.436 1.75 1.104 2.298a5.846 5.846 0 0 0-2.526 1.698A5.964 5.964 0 0 1 1.986 8 6.021 6.021 0 0 1 8 1.986zm-.035 4.02c1.097 0 1.988.892 1.988 2.012A1.988 1.988 0 0 1 8.03 10c-.029 0-.057-.006-.086-.006-.025 0-.049.005-.074.006a1.994 1.994 0 0 1-1.916-2.006c0-1.096.892-1.988 2.012-1.988zm-.096 4.992c.024.001.048.008.072.008h.024c.022 0 .04-.007.062-.008a4.84 4.84 0 0 1 3.643 1.752A5.963 5.963 0 0 1 8 14.014a5.965 5.965 0 0 1-3.742-1.31 4.848 4.848 0 0 1 3.611-1.706z"></path>
                            </svg>
                            </a>
                        @endguest
                        @if(Auth::check())

                            <div class="dropdown-center">
                                <div id="user" class="user dropdown-toggle" data-bs-toggle="dropdown"
                                     aria-expanded="false">
                                    <img src="{{ asset(auth()->user()->avatar) }}" alt=" user avatar"
                                         class="w-100 h-100">
                                </div>
                                <ul class="dropdown-menu">
                                    <li class="justify-content-center">
                                        {{ auth()->user()->fullname() }}
                                    </li>
                                    <hr noshade class="my-1">
                                    @if(auth()->user()->role_id === 1)
                                        <li>
                                            <a href="/admin/dashboard"
                                               class="p-0 ps-2 fs-6 d-flex justify-content-start align-items-center gap-1 text-light">
                                                <i class="fa-solid fa-user-tie"></i>
                                                پنل مدیریت
                                            </a>
                                        </li>
                                    @endif
                                    @if(!auth()->user()->hasVerifiedEmail())
                                        <li>
                                            <a href="/email/verify"
                                               class="p-0 ps-2 fs-6 d-flex justify-content-start align-items-center gap-1 text-warning">
                                                <i class="fa-solid fa-warning"></i>
                                                تایید ایمیل
                                            </a>
                                        </li>
                                    @endif
                                    <li class="m-0">
                                        <form action="{{ route("logout") }}" method="post" class="logout p-0 ps-2">
                                            @csrf
                                            <button type="submit"
                                                    class="text-danger p-0 border-0 bg-transparent d-flex justify-content-start align-items-center gap-1 fw-semibold">
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                                خروج از حساب کاربری
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            <div class="sub-menu">
                <ul class="p-0 m-0 list d-flex flex-column align-items-start gap-2 mb-4">
                    @foreach($menu_items as $menu_item)
                        <li class="w-100">
                            <a class="color-white fs-5 fw-bold w-100 py-2 rounded-3 px-2"
                               href="{{ $menu_item->url_address }}">{{ $menu_item->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
