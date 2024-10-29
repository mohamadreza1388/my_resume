<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::create([
            "key" => "name",
            "value" => "محمدرضا نصراله زاده"
        ]);
        Setting::create([
            "key" => "job",
            "value" => "برنامه نویس و توسعه دهنده فرانت اند و بک اند"
        ]);
        Setting::create([
            "key" => "resume",
            "value" => "#"
        ]);
        Setting::create([
            "key" => "github",
            "value" => "#"
        ]);
        Setting::create([
            "key" => "email",
            "value" => "#"
        ]);
        Setting::create([
            "key" => "instagram",
            "value" => "#"
        ]);
        Setting::create([
            "key" => "telegram",
            "value" => "#"
        ]);
        Setting::create([
            "key" => "main_picture",
            "value" => "assets/images/Header/profile.jpg"
        ]);
    }
}
