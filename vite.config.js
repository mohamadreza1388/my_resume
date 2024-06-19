import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/panel.css',
                'resources/js/panel.js',
                'resources/js/app.js',
                'resources/css/login-register.css',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        minify: 'terser', // استفاده از Terser برای فشرده‌سازی
        terserOptions: {
            compress: false, // غیرفعال کردن فشرده‌سازی کد
            mangle: false, // غیرفعال کردن تغییر نام متغیرها و توابع
            format: {
                beautify: false, // غیرفعال کردن زیباسازی کد
                indent_level: 0, // حذف تمام فاصله‌ها
            },
        },
    },
});
