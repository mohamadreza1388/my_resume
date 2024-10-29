import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const $ = document;
    const elm_darkModeBtn = $.querySelector(".change_theme");

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
});
