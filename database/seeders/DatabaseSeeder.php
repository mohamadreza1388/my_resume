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
            'value' => '#',
        ]);
        Setting::create([
            'key' => 'github',
            'value' => '#',
        ]);
        Setting::create([
            'key' => 'email',
            'value' => '#',
        ]);
        Setting::create([
            'key' => 'instagram',
            'value' => '#',
        ]);
        Setting::create([
            'key' => 'telegram',
            'value' => '#',
        ]);
        Setting::create([
            'key' => 'main_picture',
            'value' => 'assets/images/Header/profile.jpg',
        ]);
        Setting::create([
            'key' => 'about',
            'value' => 'هادی حیدری آذر هستم برنامه نویس و توسعه دهنده فرانت اند.
                <br>
                برنامه نویسی رو از اولین روز سال ۱۴۰۱ شروع کردم و از همون اول خودم رو به چالش میکشیدم تا بتونم پیشرفت کنم و همیشه کاری رو که شروع میکنم رو به بهترین نحوه تموم میکنم و دقت زیادی روی جزئیات کارم دارم و همیشه با کنجکاوی و بروز بودن و یادگیری چیز های بیشتر در دنیای برنامه نویسی سعی میکنم تا سطح خودم رو بالا و بالاتر ببرم و پیشرفت کنم.',
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
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'JQUERY',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'REACT',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'TAILWIND',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'BOOTSTRAP',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'SCSS',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'PUG',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'NPM',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'VITE',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'COMPOSER',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'PHP',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'LARAVEL',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'GIT AND GITHUB',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'RESTFUL API',
            'value' => '90',
        ]);
        Skill::create([
            'title' => 'MVC',
            'value' => '90',
        ]);

        $work_sample = WorkSample::create([
            'title' => 'سافت اپ',
            'description' => 'سایت دانلود نرم افزار سافت اپ',
            'thumbnail' => 'assets/images/Work-Samples/softapp.png',
            'url' => 'https://softapp.ir',
        ]);

        Information::create([
            'title' => 'Html',
            'work_sample_id' => $work_sample->id,
        ]);

        Information::create([
            'title' => 'Css',
            'work_sample_id' => $work_sample->id,
        ]);

    }
}
