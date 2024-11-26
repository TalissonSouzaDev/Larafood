<?php

use App\Http\Controllers\Admin\{
    DetailPlanController,
    PermissionController,
    ProfileController,
    PlanController
};

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
     * Route Profile
     */
    Route::match(["POST","GET"],"/profile/search",[ProfileController::class,"search"])->name("profile.search");
    Route::get("/profiles",[ProfileController::class,"index"])->name("profile.index");
    Route::get("/profile/{url}",[ProfileController::class,"show"])->name("profile.show");
    Route::get("/profile/create",[ProfileController::class,"create"])->name("profile.create");
    Route::get("/profile/edit/{url}",[ProfileController::class,"edit"])->name("profile.edit");
    Route::post("/profiles/store",[ProfileController::class,"store"])->name("profile.store");
    Route::put("/profile/update/{url}",[ProfileController::class,"update"])->name("profile.update");
    Route::delete("/profile/{id}",[ProfileController::class,"destroy"])->name("profile.destroy");

     /**
     * 
     * Route Permission
     */
    Route::match(["POST","GET"],"/permission/search",[PermissionController::class,"search"])->name("permission.search");
    Route::get("/permissions",[PermissionController::class,"index"])->name("permission.index");
    Route::get("/permission/{url}",[PermissionController::class,"show"])->name("permission.show");
    Route::get("/permission/create",[PermissionController::class,"create"])->name("permission.create");
    Route::get("/permission/edit/{url}",[PermissionController::class,"edit"])->name("permission.edit");
    Route::post("/permissions/store",[PermissionController::class,"store"])->name("permission.store");
    Route::put("/permission/update/{url}",[PermissionController::class,"update"])->name("permission.update");
    Route::delete("/permission/{id}",[PermissionController::class,"destroy"])->name("permission.destroy");
});

Route::get('/', function () {
    return view('welcome');
});
