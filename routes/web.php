<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix("admin")->group(function() {

    /**
     * Route DetailPlan
     */
    Route::delete("/plans/{url}/details/{id_detail}/destroy",[DetailPlanController::class,"destroy"])->name("detail.plan.destroy");
    Route::put("/plans/{url}/details/{id_detail}/update",[DetailPlanController::class,"update"])->name("detail.plan.update");
    Route::get("/plans/{url}/details/{id_detail}/edit",[DetailPlanController::class,"edit"])->name("detail.plan.edit");
    Route::post("/plans/{url}/details",[DetailPlanController::class,"store"])->name("detail.plan.store");
    Route::get("/plans/{url}/detail/create",[DetailPlanController::class,"create"])->name("detail.plan.create");
    Route::get("/plans/{url}/details",[DetailPlanController::class,"index"])->name("detail.plan.index");

    /**
     * 
     * Route Plan
     */
    Route::match(["POST","GET"],"admin/plans/search",[PlanController::class,"search"])->name("plan.search");
    Route::get("/plans",[PlanController::class,"index"])->name("plan.index");
    Route::get("/plan/{url}",[PlanController::class,"show"])->name("plan.show");
    Route::get("/plan/create",[PlanController::class,"create"])->name("plan.create");
    Route::get("/plan/edit/{url}",[PlanController::class,"edit"])->name("plan.edit");
    Route::post("/plans/store",[PlanController::class,"store"])->name("plan.store");
    Route::put("/plan/update/{url}",[PlanController::class,"update"])->name("plan.update");
    Route::delete("/plan/{id}",[PlanController::class,"destroy"])->name("plan.destroy");
});

Route::get('/', function () {
    return view('welcome');
});
