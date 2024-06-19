<?php

namespace Database\Seeders;

use App\Models\AboutMe;
use App\Models\Background;
use App\Models\Development;
use App\Models\ExamplesOfWork;
use App\Models\File;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Link;
use App\Models\MenuItem;
use App\Models\Role;
use App\Models\SectionTitle;
use App\Models\Skill;
use App\Models\Text;
use App\Models\Theme;
use App\Models\User;
use App\Models\WayCommunication;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Theme::create([
            "name" => "dark"
        ]);
        Theme::create([
            "name" => "light"
        ]);
        Background::create([
            "img_src" => "linear-gradient(rgba(0, 0, 0, 0.13),rgba(0, 0, 0, 0.05)),url('assets/images/background1.webp')",
            "title" => "main-bg",
            "theme_id" => "1"
        ]);
        Background::create([
            "img_src" => "linear-gradient(rgba(0, 0, 0, 0.13),rgba(0, 0, 0, 0.05)),url('assets/images/background2.jpg')",
            "title" => "main-bg",
            "theme_id" => "2"
        ]);
        Image::create([
            "title" => "logo1",
            "img_src" => "assets/images/logo.png"
        ]);
        Image::create([
            "title" => "main-left-img",
            "img_src" => "assets/images/main-picture.jpg"
        ]);
        Image::create([
            "title" => "mouse",
            "img_src" => "assets/images/mouse.png"
        ]);
        Image::create([
            "title" => "man-avatar",
            "img_src" => "assets/images/avatar/man.svg"
        ]);
        Image::create([
            "title" => "woman-avatar",
            "img_src" => "assets/images/avatar/woman.svg"
        ]);
        Text::create([
            "title" => "name",
            "content" => "محمد رضا نصراله زاده"
        ]);
        Text::create([
            "title" => "main_description",
            "content" => "برنامه نویس و توسعه دهنده فرانت و بک اند"
        ]);
        Text::create([
            "title" => "scroll_text",
            "content" => "اسکرول کنید"
        ]);
        Text::create([
            "title" => "copy_right",
            "content" => "© 1403 تمامی حقوق مادی و معنوی این سایت متعلق به محمد رضا نصراله زاده می‌باشد."
        ]);
        Link::create([
            "title" => "email",
            "link" => "mailto:mohamadreza1388.org@gmail.com"
        ]);
        Link::create([
            "title" => "telegram",
            "link" => "https://t.me/mpcomnet"
        ]);
        Link::create([
            "title" => "instagram",
            "link" => "https://www.instagram.com/mohamadreza_n_dev/"
        ]);
        Link::create([
            "title" => "github",
            "link" => "https://github.com/mohamadreza1388/"
        ]);
        Link::create([
            "title" => "eitaa",
            "link" => "https://eitaa.com/mohamadreza_n_dev"
        ]);
        WayCommunication::create([
            "tooltip" => "ایمیل من",
            "font_icon_class" => "fas fa-envelope",
            "img_src" => "assets/images/email.png",
            "title" => "mohamadreza1388.org@gmail.com",
            "link_id" => "1",
            "platform_name" => "email",
            "at" => "main"
        ]);
        WayCommunication::create([
            "tooltip" => "تلگرام من",
            "font_icon_class" => "fab fa-telegram",
            "img_src" => "assets/images/telegram.png",
            "title" => "@mpcomnet",
            "link_id" => "2",
            "platform_name" => "telegram",
            "at" => "main"
        ]);
        WayCommunication::create([
            "tooltip" => "گیتهاب من",
            "font_icon_class" => "fab fa-github",
            "img_src" => "assets/images/github.png",
            "title" => "mohamadreza1388",
            "link_id" => "4",
            "platform_name" => "github",
            "at" => "main"
        ]);
        WayCommunication::create([
            "img_src" => "assets/images/eitaa.png",
            "title" => "@mohamadreza_n_dev",
            "link_id" => "5",
            "platform_name" => "eitaa",
        ]);
        MenuItem::create([
            "title" => "خانه",
            "url_address" => "/"
        ]);
        MenuItem::create([
            "title" => "درباره من",
            "url_address" => "/#about-me"
        ]);
        MenuItem::create([
            "title" => "ارتباط با من",
            "url_address" => "/#contact-us"
        ]);
        MenuItem::create([
            "title" => "مهارت ها",
            "url_address" => "/#skills"
        ]);
        MenuItem::create([
            "title" => "نمونه کار",
            "url_address" => "/#work-samples"
        ]);
        File::create([
            "title" => "resume_pdf_file",
            "url_address" => "assets/resume-file/file.pdf"
        ]);
        SectionTitle::create([
            "belongs_to" => "about-me",
            "title" => "درباره من"
        ]);
        SectionTitle::create([
            "belongs_to" => "skills",
            "title" => "مهارت ها"
        ]);
        SectionTitle::create([
            "belongs_to" => "contact-us",
            "title" => "راه های ارتباطی"
        ]);
        SectionTitle::create([
            "belongs_to" => "work-samples",
            "title" => "نمونه کار ها"
        ]);
        AboutMe::create([
            "title" => "paragraph1",
            "content" =>
                "
             سلام من محمد رضا نصراله زاده هستم برنامه نویس فرانت اند و بک اند
            <br>
            برنامه نویسی را از سال 1401 شروع کرده ام و همیشه عاشق چالش های سخت بوده ام. و ینظر من ادم بدون چالش یک زندگی تکراری داره و چالش ها باعث پیشرفت انسان میشه . علاقه شدیدی به برنامه نویسی دارم و استراحتم وقتیه که برنامه نویسی میکنم
             "
        ]);
        Skill::create([
            "value" => "90",
            "title" => "Html"
        ]);
        Skill::create([
            "value" => "89",
            "title" => "Css"
        ]);
        Skill::create([
            "value" => "35",
            "title" => "Php"
        ]);
        Skill::create([
            "value" => "60",
            "title" => "Laravel"
        ]);
        Skill::create([
            "value" => "80",
            "title" => "Scss"
        ]);
        Skill::create([
            "value" => "65",
            "title" => "Sass"
        ]);
        Skill::create([
            "value" => "78",
            "title" => "Bootstrap"
        ]);
        Skill::create([
            "value" => "48",
            "title" => "Pug"
        ]);
        Skill::create([
            "value" => "60",
            "title" => "Npm"
        ]);
        Development::create([
            "name" => "Html"
        ]);
        Development::create([
            "name" => "Css"
        ]);
        Development::create([
            "name" => "Bootstrap"
        ]);
        Development::create([
            "name" => "Pug"
        ]);
        Development::create([
            "name" => "Ui Ux"
        ]);
        Development::create([
            "name" => "Scss"
        ]);
        Development::create([
            "name" => "Normalize"
        ]);
        Development::create([
            "name" => "Laravel"
        ]);
        Development::create([
            "name" => "Php"
        ]);
        Development::create([
            "name" => "Jquery"
        ]);
        Development::create([
            "name" => "Javascript"
        ]);
        Development::create([
            "name" => "Aos"
        ]);
        Development::create([
            "name" => "Uglify js"
        ]);
        Development::create([
            "name" => "Csso for css"
        ]);
        Development::create([
            "name" => "Swiper js"
        ]);
        Development::create([
            "name" => "Font awesome"
        ]);
        Development::create([
            "name" => "Slick"
        ]);
        Development::create([
            "name" => "Video js"
        ]);
        ExamplesOfWork::create([
            "img_src" => "assets/images/work-sample/travel.PNG",
            "work_title" => "سایت زیبای تور سفر",
            "url_address" => "https://travel.iapp.ir/",
            "information_title" => "سفر نامه"
        ]);
        ExamplesOfWork::create([
            "img_src" => "assets/images/work-sample/avita.png",
            "work_title" => "سایت اموزشگاهی اویتا",
            "url_address" => "https://front.iapp.ir/avita/avita/",
            "information_title" => "اویتا"
        ]);
        ExamplesOfWork::create([
            "img_src" => "assets/images/work-sample/decorative.png",
            "work_title" => "سایت دکوراسیون و وسایل تزئینی",
            "url_address" => "https://front.iapp.ir/decorative-accessories-store/Decorative%20accessories%20store/",
            "information_title" => "دکوراسیون داخلی"
        ]);
        ExamplesOfWork::create([
            "img_src" => "assets/images/work-sample/coffee.svg",
            "work_title" => "سایت فروش انواع قهوه",
            "url_address" => "https://front.iapp.ir/coffee/Coffee%20site/",
            "information_title" => "سایت قهوه"
        ]);
        for ($i = 1; $i <= count(ExamplesOfWork::all()); $i++) {
            $work_samples = ExamplesOfWork::find($i);
            $rand = rand(1, count(Development::all()) - 6);
            $work_samples->developments()->attach([$rand + 1, $rand + 3, $rand + 6, $rand + 4, $rand + 5, $rand + 2]);
        }
        Gender::create([
            "title" => "مرد"
        ]);
        Gender::create([
            "title" => "زن"
        ]);
        Gender::create([
            "title" => "دو جنسه"
        ]);
        Role::create([
            "title" => "admin"
        ]);
        Role::create([
            "title" => "normal_user"
        ]);
        User::create([
            "name" => "محمدرضا",
            "last_name" => "نصراللّه زاده",
            "gender_id" => "1",
            "role_id" => "1",
            "email" => "mohamadreza1388.org@gmail.com",
            "password" => "1A2A3b4b"
        ]);
        foreach(User::all() as $user) {
            $user_gender = $user->gender_id;
            if ($user_gender === 1) {
                if (is_null($user->avatar)) {
                    $user->update([
                        "avatar" => Image::where("title", "man-avatar")->first()->img_src
                    ]);
                }
            } elseif ($user_gender === 2) {
                if (is_null($user->avatar)) {
                    $user->update([
                        "avatar" => Image::where("title", "woman-avatar")->first()->img_src
                    ]);
                }
            }
        }
    }
}
