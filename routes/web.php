<?php

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

Route::match(["POST","GET"],"admin/plans/search",[PlanController::class,"search"])->name("plan.search");
Route::get("admin/plans",[PlanController::class,"index"])->name("plan.index");
Route::get("admin/plan/{url}",[PlanController::class,"show"])->name("plan.show");
Route::get("admin/plan/create",[PlanController::class,"create"])->name("plan.create");
Route::get("admin/plan/edit/{url}",[PlanController::class,"edit"])->name("plan.edit");
Route::post("admin/plans/store",[PlanController::class,"store"])->name("plan.store");
Route::put("admin/plan/update/{url}",[PlanController::class,"update"])->name("plan.update");
Route::delete("admin/plan/{id}",[PlanController::class,"destroy"])->name("plan.destroy");

Route::get('/', function () {
    return view('welcome');
});
