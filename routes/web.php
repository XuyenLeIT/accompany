<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarauselController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TVGSController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, "home"])->name("client.home");
Route::get('/tu-van-giam-sat', [TVGSController::class, "tvgs"])->name("client.tvgs");
Route::get('/bao-gia-tu-van-giam-sat', [PriceController::class, "price"])->name("client.price");
Route::get('/du-an', [ProjectController::class, "project"])->name("client.project");
Route::get('/lien-he', [ContactController::class, "contact"])->name("client.contact");
Route::get('/tin-tuc', [NewController::class, "news"])->name("client.news");
Route::get('/detail', [NewController::class, "newsDetail"])->name("client.newsDetail");
// admin
Route::get('/admin/dashboard', [AdminController::class, "admin"])->name("admin.dashboard");
//carausel
Route::get('/admin/carausel', [CarauselController::class, "index"])->name("admin.carausels.index");
Route::get('/admin/carausel/create', [CarauselController::class, "create"])
    ->name("admin.carausels.create");
Route::post('/admin/carausel/create', [CarauselController::class, "store"])->name("admin.carausels.store");
Route::get('/admin/carausel/edit/{id}', [CarauselController::class, "edit"])
    ->name("admin.carausels.edit");
Route::post('/admin/carausel/edit/{carausel}', [CarauselController::class, "update"])->name("admin.carausels.update");
Route::get('/admin/carausel/delete/{id}', [CarauselController::class, "delete"])
    ->name("admin.carausels.delete");

//intro
Route::get('/admin/intro', [AdminController::class, "homeIntro"])->name("admin.homeIntro");
Route::post('/admin/intro', [AdminController::class, "storeHomeIntro"])
    ->name("admin.storeHomeIntro");
Route::post('/admin/intro/{intro}', [AdminController::class, "updateIntro"])
->name("admin.updateIntro");
//video intro
Route::get('/admin/intro-video', [AdminController::class, "introVideo"])->name("admin.introVideo");
Route::post('/admin/intro-video/create', [AdminController::class, "storeVideoIntro"])
    ->name("admin.storeVideoIntro");
Route::post('/admin/intro-video/{introMovie}', [AdminController::class, "updateVideoIntro"])
    ->name("admin.updateVideoIntro");

//benefit intro
Route::post('/admin/introBenefit', [AdminController::class, "storeIntroBenefit"])->name("admin.store.benefit");
Route::get('/admin/introBenefit/{id}', [AdminController::class, "editIntroBenefit"])->name("admin.edit.benefit");
Route::put('/admin/introBenefit/{id}', [AdminController::class, "updateIntroBenefit"])->name("admin.update.benefit");
Route::get('/admin/introBenefit/delete/{id}', [AdminController::class, "deleteIntroBenefit"])->name("admin.delete.benefit");
