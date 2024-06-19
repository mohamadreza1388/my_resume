<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ClearCacheController;
use App\Http\Controllers\DeployController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, "index"]);
Auth::routes();
Route::get('/home', function () {
    return redirect("/");
});
Route::get('/logout', function () {
    abort(404);
});
Route::prefix("admin")->middleware("auth")->middleware("admin")->group(function () {
    Route::get("dashboard", [DashboardController::class, "dashboard"]);
    Route::prefix("users")->group(function () {
        Route::post("delete/{id}", [DashboardController::class, "delete"])->name("user-delete");
        Route::get("{id}/edit", [DashboardController::class, "edit"])->name("user-edit");
        Route::put("{id}/edit", [DashboardController::class, "update"])->name("user-post-edit");
        Route::get("viewAccount/{id}", [DashboardController::class, "viewAccount"])->name("view-account");
        Route::get("create", [DashboardController::class, "createView"])->name("user-create");
        Route::post("create", [DashboardController::class, "create"])->name("user-post-create");
    });
    Route::prefix("skill")->group(function () {
        Route::post("delete/{id}", [DashboardController::class, "skillDelete"])->name("skill-delete");
        Route::get("{id}/edit", [DashboardController::class, "skillEdit"])->name("skill-edit");
        Route::put("{id}/edit", [DashboardController::class, "skillUpdate"])->name("skill-post-edit");
        Route::get("create", [DashboardController::class, "skillCreateView"])->name("skill-create");
        Route::post("create", [DashboardController::class, "skillCreate"])->name("skill-post-create");
    });
    Route::prefix("way_communication")->group(function () {
        Route::post("delete/{id}", [DashboardController::class, "wayCommunicationDelete"])->name("way_communication-delete");
        Route::get("{id}/edit", [DashboardController::class, "wayCommunicationEdit"])->name("way_communication-edit");
        Route::put("{id}/edit", [DashboardController::class, "wayCommunicationUpdate"])->name("way_communication-post-edit");
        Route::get("create", [DashboardController::class, "wayCommunicationCreateView"])->name("way_communication-create");
        Route::post("create", [DashboardController::class, "wayCommunicationCreate"])->name("way_communication-post-create");
    });
    Route::prefix("link")->group(function () {
        Route::post("delete/{id}", [DashboardController::class, "linkDelete"])->name("link-delete");
        Route::get("{id}/edit", [DashboardController::class, "linkEdit"])->name("link-edit");
        Route::put("{id}/edit", [DashboardController::class, "linkUpdate"])->name("link-post-edit");
        Route::get("create", [DashboardController::class, "linkCreateView"])->name("link-create");
        Route::post("create", [DashboardController::class, "linkCreate"])->name("link-post-create");
    });
    Route::prefix("development")->group(function () {
        Route::post("delete/{id}", [DashboardController::class, "developmentDelete"])->name("development-delete");
        Route::get("{id}/edit", [DashboardController::class, "developmentEdit"])->name("development-edit");
        Route::put("{id}/edit", [DashboardController::class, "developmentUpdate"])->name("development-post-edit");
        Route::get("create", [DashboardController::class, "developmentCreateView"])->name("development-create");
        Route::post("create", [DashboardController::class, "developmentCreate"])->name("development-post-create");
    });
    Route::prefix("work_sample")->group(function () {
        Route::post("delete/{id}", [DashboardController::class, "workSampleDelete"])->name("work_sample-delete");
        Route::get("{id}/edit", [DashboardController::class, "workSampleEdit"])->name("work_sample-edit");
        Route::put("{id}/edit", [DashboardController::class, "workSampleUpdate"])->name("work_sample-post-edit");
        Route::get("create", [DashboardController::class, "workSampleCreateView"])->name("work_sample-create");
        Route::post("create", [DashboardController::class, "workSampleCreate"])->name("work_sample-post-create");
    });
    Route::prefix("setting")->group(function (){
        Route::post("about_me",[DashboardController::class,"about_me"])->name("about");
        Route::post("name",[DashboardController::class,"name"])->name("name");
        Route::post("description",[DashboardController::class,"description"])->name("description");
        Route::post("copy_right",[DashboardController::class,"copy_right"])->name("copy_right");
        Route::post("main_left_img",[DashboardController::class,"main_left_img"])->name("main_left_img");
        Route::post("resume_file",[DashboardController::class,"resume_file"])->name("resume_address");
        Route::post("add_user_file",[DashboardController::class,"add_user_file"])->name("add_user_file");
    });
});
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');
Route::get("clear_cache",[ClearCacheController::class,"cache"]);
Route::get('/deploy', [DeployController::class,"deploy"]);
