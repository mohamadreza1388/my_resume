$(function () {
    function getCookie(cookie_name) {
        var name = cookie_name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == " ") {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "null";
    }

    function changeTheme(data) {
        if (data === "dark") {
            $(":root").css({
                "--color1": "#22C55E",
                "--color2": "#6B7280",
                "--color3": "#27272A",
                "--color4": "#3F3F46",
                "--color5": "#49494f",
                "--progress": "#71717A",
            });
            $('[class*="text-light"]').removeClass("text-black");
            $(".shadow-1").css("box-shadow", "-15px 15px 30px -15px #000");
            $(".scroll").css({
                filter: "invert(0)",
            });
            $("main.has-bg1").css({
                "background-image": bg_dark[0].img_src,
            });
            $(".form-control").css({
                "color": "white"
            })
            $(".form-select").css({
                "color": "white"
            })
            $(".dropdown-menu").addClass("dropdown-menu-dark")
        } else if (data === "light") {
            $(":root").css({
                "--color1": "#22C55E",
                "--color2": "#6B7280",
                "--color3": "#F3F4F6",
                "--color4": "#FFFFFF",
                "--color5": "#fafafa",
                "--progress": "#E5E7EB",
            });
            $('[class*="text-light"]').addClass("text-black");
            $(".shadow-1").css(
                "box-shadow",
                "rgb(0 0 0 / 31%) -15px 15px 30px -15px",
            );
            $(".scroll").css({
                filter: "invert(1)",
            });
            $("main.has-bg1").css({
                "background-image": bg_light[1].img_src,
            });
            $(".form-control").css({
                "color": "black"
            })
            $(".form-select").css({
                "color": "black"
            })
            $(".dropdown-menu").removeClass("dropdown-menu-dark");
        }
    }

    $("body").show().attr("theme", "light");
    changeTheme("light")

    $(".switch__input").change(function () {
        function status() {
            if ($(".switch__input").is(":checked")) {
                return "dark"
            } else {
                return "light"
            }
        }

        $("body").attr("theme", status())
        changeTheme(status())

    })


    function loadingHide(data = 300, time = 500) {
        setTimeout(function () {
            $(".loading").fadeOut(data);
        }, time);
    }

    function loadingShow(data = 0, time = 0) {
        setTimeout(function () {
            $(".loading").fadeIn(data);
        }, time);
    }

    loadingHide()

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]',);

    const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl),);

    $(".side-bar").hover(
        function () {
            $(".side-bar").removeClass("align-items-center").addClass("align-items-end").addClass("px-side-bar")
            $(".side-bar .side-bar-text").fadeIn(200)
            $(".items a").addClass("justify-content-start").removeClass("justify-content-center")
        }, function () {
            $(".side-bar .side-bar-text").fadeOut(0)
            $(".items a").addClass("justify-content-center").removeClass("justify-content-start")
            setTimeout(function () {
                $(".side-bar").addClass("align-items-center").removeClass("align-items-end").removeClass("px-side-bar")
            }, 300)
        }
    )
    let active_page = getCookie("ActivePage")
    if (active_page === "null") {
        $(".items a[tab_name = home]").addClass("active")
    } else {
        $(`.items a[tab_name = ${active_page}`).addClass("active")
    }

    function show_tab() {
        let tab_name = $(".items a.active").attr("tab_name")
        $(`section[tab_name = ${tab_name}`).show().siblings().hide()
    }

    show_tab()

    $(".items a").click(function () {
        loadingShow(100)
        loadingHide()
        let data = $(this)
        setTimeout(function () {
            data.addClass("active").siblings().removeClass("active")
            show_tab()
            let data2 = $(".items a.active").attr("tab_name")
            document.cookie = `ActivePage=${data2};max-age=86400`;
        }, 100)
        return false
    })

    $(".file_inp").change(function () {
        if (this.files.length > 0) {
            let label_class = $(this).next("label").attr("class").split(" ")
            label_class = label_class[1].substring(12)
            $(this).next("label").removeClass(`btn-outline-${label_class}`).addClass(`btn-${label_class}`)
            let file = this.files[0];
            $(this).siblings(".file_name").text(file.name)
        }
    })


})
