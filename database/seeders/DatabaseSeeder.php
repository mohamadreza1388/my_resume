<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\Setting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Skill;
use App\Models\User;
use App\Models\WorkSample;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'محمدرضا نصراله زاده',
            'email' => 'mohamadreza1388.org@gmail.com',
            'password' => '1A2A3b4b',
        ]);

        Setting::create([
            'key' => 'name',
            'value' => 'محمدرضا نصراله زاده',
        ]);
        Setting::create([
            'key' => 'job',
            'value' => 'برنامه نویس و توسعه دهنده فرانت اند و بک اند',
        ]);
        Setting::create([
            'key' => 'resume',
            'value' => 'assets/files/resume.pdf',
        ]);
        Setting::create([
            'key' => 'github',
            'value' => 'https://github.com/mohamadreza1388',
        ]);
        Setting::create([
            'key' => 'email',
            'value' => 'mailto:mohamadreza1388.org@gmail.com',
        ]);
        Setting::create([
            'key' => 'instagram',
            'value' => 'https://www.instagram.com/mohamadrezanz.ir',
        ]);
        Setting::create([
            'key' => 'telegram',
            'value' => 'https://t.me/mohamadreza_nasrz',
        ]);
        Setting::create([
            'key' => 'main_picture',
            'value' => 'assets/images/Header/profile.jpg',
        ]);
        Setting::create([
            'key' => 'about',
            'value' => 'محمد رضا نصراله زاده هستم برنامه نویس فرانت اند و بک اند.
                <br>
                برای اینکه بیشتر با من اشنا بشوید میتوانید از طریق لینک های بالا با من ارتباط گرفته یا رزومه کاری من را مشاهده کنید. علاقه مند به کار های تیمی هستم و جزو افرادی هستم که کارکردن حضوری و گروهی را دوست دارم.همچنین میتوانید با مهارت های من در بخش زیر اشنا شوید.',
        ]);

        Skill::create([
            'title' => 'HTML',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'CSS',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'JAVASCRIPT',
            'value' => '80',
        ]);
        Skill::create([
            'title' => 'JQUERY',
            'value' => '85',
        ]);
        Skill::create([
            'title' => 'REACT',
            'value' => '30',
        ]);
        Skill::create([
            'title' => 'TAILWIND',
            'value' => '85',
        ]);
        Skill::create([
            'title' => 'BOOTSTRAP',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'SCSS',
            'value' => '70',
        ]);
        Skill::create([
            'title' => 'PUG',
            'value' => '80',
        ]);
        Skill::create([
            'title' => 'NPM',
            'value' => '85',
        ]);
        Skill::create([
            'title' => 'VITE',
            'value' => '70',
        ]);
        Skill::create([
            'title' => 'COMPOSER',
            'value' => '70',
        ]);
        Skill::create([
            'title' => 'PHP',
            'value' => '70',
        ]);
        Skill::create([
            'title' => 'LARAVEL',
            'value' => '80',
        ]);
        Skill::create([
            'title' => 'GIT AND GITHUB',
            'value' => '85',
        ]);
        Skill::create([
            'title' => 'RESTFUL API',
            'value' => '95',
        ]);
        Skill::create([
            'title' => 'MVC',
            'value' => '95',
        ]);

        $work_sample = WorkSample::create([
            'title' => 'سافت اپ',
            'description' => 'سایت دانلود نرم افزار سافت اپ',
            'thumbnail' => 'assets/images/Work-Samples/softapp.png',
            'url' => 'https://softapp.ir',
        ]);
    }
}
