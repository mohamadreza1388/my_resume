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
        document.cookie = `Theme=${data};max-age=86400`;
        if (data === "dark") {
            $(":root").css({
                "--color1": "#22C55E",
                "--color2": "#6B7280",
                "--color3": "#27272A",
                "--color4": "#3F3F46",
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
                "color":"white"
            })
            $(".form-select").css({
                "color":"white"
            })
            $(".dropdown-menu").addClass("dropdown-menu-dark")
        } else if (data === "light") {
            $(":root").css({
                "--color1": "#22C55E",
                "--color2": "#6B7280",
                "--color3": "#F3F4F6",
                "--color4": "#FFFFFF",
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
                "color":"black"
            })
            $(".form-select").css({
                "color":"black"
            })
            $(".dropdown-menu").removeClass("dropdown-menu-dark")
        }
    }

    let bodyTheme = getCookie("Theme");

    if (bodyTheme === "null") {
        bodyTheme = "light";
    }

    $("body").show().attr("theme", bodyTheme);

    $(".light-dark svg").each(function () {
        let attr = $(this).attr("data");
        if (attr === bodyTheme) {
            $(this).addClass("active");
        }
    });

    changeTheme(bodyTheme);

    setTimeout(function () {
        $(".loading").fadeOut(300);
    }, 500);
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]',
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl),
    );

    $(".my-progress").each(function () {
        let max = $(this).attr("max");
        let value = $(this).children(".bar").attr("value");
        let result = (value * 100) / max;
        $(this)
            .children(".bar")
            .css({ width: result + "%" });
        $(this)
            .parent()
            .children(".text")
            .children(".bar-value")
            .text(result + "%");
    });

    $(".inf-btn").click(function () {
        $(".information").hide();
        $(this).siblings(".information").show(300);
        return false;
    });

    $(".information")
        .click(function () {
            return false;
        })
        .children(".header")
        .children(".close-btn")
        .click(function () {
            $(this).closest(".information").hide(300);
        });

    $(".bars-icon").click(function () {
        if ($(".sub-menu").is(":hidden")) {
            $(".bars-icon div:nth-child(1)").css({
                rotate: "46deg",
            });
            $(".bars-icon div:nth-child(2)").css({
                opacity: "0",
            });
            $(".bars-icon div:nth-child(3)").css({
                rotate: "-47deg",
                transform: "translate(12px, -12px)",
            });
            $(".sub-menu").slideDown(300);
        } else {
            $(".bars-icon div:nth-child(1)").css({
                rotate: "0deg",
            });
            $(".bars-icon div:nth-child(2)").css({
                opacity: "1",
            });
            $(".bars-icon div:nth-child(3)").css({
                rotate: "0deg",
                transform: "translate(0px, 0px)",
            });
            $(".sub-menu").slideUp(300);
        }
    });

    function checkHidden() {
        if ($(".sub-menu").is(":hidden")) {
        } else {
            $(".bars-icon div:nth-child(1)").css({
                rotate: "0deg",
            });
            $(".bars-icon div:nth-child(2)").css({
                opacity: "1",
            });
            $(".bars-icon div:nth-child(3)").css({
                rotate: "0deg",
                transform: "translate(0px, 0px)",
            });
            $(".sub-menu").slideUp(300);
        }
    }

    $("section").click(function () {
        checkHidden();
    });

    $("main").click(function () {
        checkHidden();
    });

    $(".light-dark").click(function () {
        $(this)
            .children("svg.active")
            .removeClass("active")
            .siblings()
            .addClass("active");
        let nowTheme = $(".light-dark svg.active").attr("data");
        $("body").attr("theme", nowTheme);
        changeTheme(nowTheme);
    });
});
