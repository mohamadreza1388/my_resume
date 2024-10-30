<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::middleware("auth")->prefix("admin")->name("admin.")->group(function () {
   Route::get("/setting", [SettingController::class, "index"])->name("setting");
   Route::post("/setting/set", [SettingController::class, "set"])->name("setting.set");
});

require __DIR__.'/auth.php';
