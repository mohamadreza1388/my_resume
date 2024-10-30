import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.*',
    ],
    theme: {
        extend:{
            boxShadow: {
                'big': '0px 0px 50px 1px',
                's': '0px 0px 35px 1px'
            },
            height:{
                "admin": "calc(100vh - 138px)"
            },
            animation: {
                profile: "profile 4s linear infinite",
            },
            keyframes: {
                profile: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-8%)' },
                }
            }
        }
    }
};
