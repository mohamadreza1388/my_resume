import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const $ = document;
    const elm_darkModeBtn = $.querySelector(".change_theme");
    const elm_code_buttons = $.querySelectorAll("button.code")
    const elm_work_samples = $.querySelectorAll(".work_sample")
    const elm_overlay = $.querySelector(".overlay")
    const elm_informations = $.querySelectorAll(".information")

    //Functions
    const toggleDarkMode = () => {
        const html = document.documentElement;
        if (html.classList.contains("dark")) {
            html.classList.remove("dark");
            localStorage.setItem("theme", "light");
        } else {
            html.classList.add("dark");
            localStorage.setItem("theme", "dark");
        }
    };

    const toggleOverlay = () => {
        if (elm_overlay.classList.contains("hidden")) {
            elm_overlay.classList.remove("hidden");
            setTimeout(() => {
                elm_overlay.classList.remove("opacity-0");
            }, 0);
        } else {
            elm_overlay.classList.add("opacity-0");
            setTimeout(() => {
                elm_overlay.classList.add("hidden");
            }, 300);
        }
    };

    const toggleInformation = (element) => {
        if (element === "*") {
            elm_informations.forEach((i) => {
                i.classList.add("opacity-0");
                setTimeout(() => {
                    i.classList.add("hidden");
                }, 300);
            })
        } else {
            if (element.classList.contains("hidden")) {
                element.classList.remove("hidden");
                setTimeout(() => {
                    element.classList.remove("opacity-0");
                }, 0);
            } else {
                element.classList.add("opacity-0");
                setTimeout(() => {
                    element.classList.add("hidden");
                }, 300);
            }
        }
    }

    //Conditions
    if (localStorage.getItem("theme") === "dark") {
        document.documentElement.classList.add("dark");
    }

    //Events
    window.addEventListener("load", () => {
    });

    elm_darkModeBtn.addEventListener("click", () => {
        toggleDarkMode();
    });

    elm_overlay.addEventListener("click", () => {
        toggleOverlay()
        toggleInformation("*")
    })

    elm_code_buttons.forEach((element) => {
        element.addEventListener("click", (e) => {
            e.preventDefault()
            e.stopPropagation()
            toggleOverlay()
            toggleInformation(element.nextElementSibling)
        })
    })

    elm_informations.forEach((element) => {
        element.addEventListener("click", (e) => {
            e.preventDefault()
            e.stopPropagation()
            element.children[0].children[1].addEventListener("click", () => {
                toggleOverlay()
                toggleInformation("*")
            })
        })
    })
});
