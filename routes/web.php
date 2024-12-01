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
Route::get('/admin/intro', [AdminController::class, "homeIntro"])
->name("admin.homeIntro");
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
Route::post('/admin/introBenefit', [AdminController::class, "storeIntroBenefit"])
->name("admin.store.benefit");
Route::get('/admin/introBenefit/{id}', [AdminController::class, "editIntroBenefit"])->name("admin.edit.benefit");
Route::put('/admin/introBenefit/{id}', [AdminController::class, "updateIntroBenefit"])->name("admin.update.benefit");
Route::get('/admin/introBenefit/delete/{id}', [AdminController::class, "deleteIntroBenefit"])->name("admin.delete.benefit");

//cancel form
Route::get('/admin/cancel/form/{id}', [AdminController::class, "canelForm"])
->name("admin.form.cancel");

//intro
Route::get('/admin/panel', [AdminController::class, "panelJob"])
->name("admin.panelJob.index");
Route::post('/admin/panel/create', [AdminController::class, "createPanelJob"])
->name("admin.panelJob.store");
Route::get('/admin/panel/{id}', [AdminController::class, "editPanelJob"])
->name("admin.panelJob.edit");
Route::post('/admin/panel/{panelJob}', [AdminController::class, "updatePanelJob"])
->name("admin.panelJob.storeUpdate");
Route::get('/admin/panel/delete/{id}', [AdminController::class, "deletePanelJob"])
->name("admin.panelJob.delete");

//panel image
Route::get('/admin/panel/detail/{id}', [AdminController::class, "detailPanelJob"])
->name("admin.panelJob.detail");
Route::post('/admin/panel/detail/{id}', [AdminController::class, "storePanelJobImage"])
->name("admin.panelJob.storePanelImage");
Route::post('/admin/panel/image/{panelJobImage}', [AdminController::class, "updatePanelJobImage"])
->name("admin.panelJob.updatePanelImage");
Route::get('/admin/panel/image/edit/{id}', [AdminController::class, "editPanelJobImage"])->name("admin.panelJob.editPanelJobImage");
Route::get('/admin/panel/image/delete/{id}', [AdminController::class, "deletePanelJobImage"])->name("admin.panelJob.deletePanelJobImage");
//outstanding
Route::get('/admin/outstanding', [AdminController::class, "outstanding"])->name("admin.outstanding.index");
Route::get('/admin/outstanding/{id}', [AdminController::class, "editOutstanding"])->name("admin.outstanding.edit");
Route::post('/admin/outstanding', [AdminController::class, "storeOutstanding"])->name("admin.outstanding.create");
Route::post('/admin/outstanding/update/{outstanding}', [AdminController::class, "updateOutstanding"])->name("admin.outstanding.update");

//feedbacks
Route::get('/admin/feedback', [AdminController::class, "feedback"])->name("admin.feedback.index");

Route::get('/admin/feedback/{id}', [AdminController::class, "editFeedback"])->name("admin.feedback.edit");
Route::post('/admin/feedback', [AdminController::class, "storeFeedback"])->name("admin.feedback.create");
Route::post('/admin/feedback/update/{feedback}', [AdminController::class, "updateFeedback"])->name("admin.feedback.update");
Route::get('/admin/feedback/delete/{id}', [AdminController::class, "deleteFeedback"])->name("admin.feedback.delete");
//TVGS
Route::get('/admin/tvgs', [AdminController::class, "viewTvsg"])->name("admin.tvgs.index");
Route::post('/admin/tvgs/create', [AdminController::class, "createIntroTVSG"])->name("admin.tvgs.create");
Route::post('/admin/tvgs/update/{introTVSG}', [AdminController::class, "updateIntroTVSG"])->name("admin.tvgs.update");
