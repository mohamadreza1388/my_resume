<div class="side-bar d-flex flex-column align-items-center justify-content-between py-3 shadow">
    <div>
        {{--        <div class="top d-flex flex-column justify-content-start align-items-center">--}}

        {{--        </div>--}}
        <div class="items d-flex flex-column align-items-center justify-content-center gap-4">
            <a tab_name="home" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fas fa-home"></i>
                <span class="text-light side-bar-text text-nowrap">صفحه نخست</span>
            </a>
            <a tab_name="users" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fas fa-users"></i>
                <span class="text-light side-bar-text text-nowrap">کاربران</span>
            </a>
            <a tab_name="skills" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-hammer"></i>
                <span class="text-light side-bar-text text-nowrap">مهارت ها</span>
            </a>
            <a tab_name="ways_communication" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-phone"></i>
                <span class="text-light side-bar-text text-nowrap">راه های ارتباطی</span>
            </a>
            <a tab_name="links" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-link"></i>
                <span class="text-light side-bar-text text-nowrap">لینک ها</span>
            </a>
            <a tab_name="developments" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-code"></i>
                <span class="text-light side-bar-text text-nowrap">ابزار های توسعه</span>
            </a>
            <a tab_name="work_samples" href="" class="text-light d-flex justify-content-center align-items-center gap-2">
                <i class="fa-solid fa-file-code"></i>
                <span class="text-light side-bar-text text-nowrap">نمونه کار ها</span>
            </a>
            <a tab_name="settings" href="" class="text-light d-flex justify-content-center align-items-center gap-2 mb-3">
                <i class="fa-solid fa-gear"></i>
                <span class="text-light side-bar-text text-nowrap">تنظیمات</span>
            </a>
        </div>
    </div>

    <div class="bottom">
        <div class="d-flex justify-content-start align-items-center gap-2">
            <div class="change-theme-wrapper d-flex justify-content-start w-100 align-items-center m-0">
                <svg display="none">
                    <symbol id="light" viewBox="0 0 24 24">
                        <g stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(0,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(45,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(90,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(135,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(180,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(225,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(270,12,12)"/>
                            <line x1="12" y1="17" x2="12" y2="20" transform="rotate(315,12,12)"/>
                        </g>
                        <circle fill="currentColor" cx="12" cy="12" r="5"/>
                    </symbol>
                    <symbol id="dark" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="M15.1,14.9c-3-0.5-5.5-3-6-6C8.8,7.1,9.1,5.4,9.9,4c0.4-0.8-0.4-1.7-1.2-1.4C4.6,4,1.8,7.9,2,12.5c0.2,5.1,4.4,9.3,9.5,9.5c4.5,0.2,8.5-2.6,9.9-6.6c0.3-0.8-0.6-1.7-1.4-1.2C18.6,14.9,16.9,15.2,15.1,14.9z"/>
                    </symbol>
                </svg>
                <label class="switch m-0">
                    <input class="switch__input shadow-2" type="checkbox" role="switch" name="dark"/>
                    <svg class="switch__icon" width="24px" height="24px" aria-hidden="true">
                        <use href="#light"/>
                    </svg>
                    <svg class="switch__icon" width="24px" height="24px" aria-hidden="true">
                        <use href="#dark"/>
                    </svg>
                    <span class="switch__inner"></span>
                    <span class="switch__inner-icons">
		<svg class="switch__icon" width="24px" height="24px" aria-hidden="true">
			<use href="#light"/>
		</svg>
		<svg class="switch__icon" width="24px" height="24px" aria-hidden="true">
			<use href="#dark"/>
		</svg>
	</span>
                    <span class="switch__sr">Dark Mode</span>
                </label>
            </div>
            <span class="text-light side-bar-text text-nowrap">
                تغییر تم
            </span>
        </div>
        <hr class="text-secondary" noshade>
        <a href="/" class="d-flex justify-content-center align-items-center gap-1">
            <div id="user" class="user">
                <img src="{{ asset( auth()->user()->avatar) }}" alt=" user avatar" class="w-100 h-100">
            </div>
            <span class="text-light side-bar-text text-nowrap">{{ auth()->user()->fullName() }}</span>
        </a>
    </div>
</div>
