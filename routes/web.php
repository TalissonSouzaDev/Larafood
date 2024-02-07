<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('admin/')->middleware('auth')->group(function(){


   # planos
Route::get('plan',[PlanController::class,'index'])->name('plan.index');
Route::get('plan/create',[PlanController::class,'create'])->name('plan.create');
Route::post('plan/store',[PlanController::class,'store'])->name('plan.store');
Route::get('plan/edit/{url}',[PlanController::class,'edit'])->name('plan.edit');
Route::get('plan/show/{url}',[PlanController::class,'show'])->name('plan.show');
Route::put('plan/update/{url}',[PlanController::class,'update'])->name('plan.update');
Route::delete('plan/destroy/{url}',[PlanController::class,'destroy'])->name('plan.destroy');
Route::match(['get','post'],'plan/filter',[PlanController::class,'filter'])->name('plan.filter');

   #planos X Detalhes
Route::get('details/plan/{url}',[DetailPlanController::class,'index'])->name('plan.detail.index');
Route::get('details/plan/{url}/create',[DetailPlanController::class,'create'])->name('plan.detail.create');
Route::post('details/plan/{url}/store',[DetailPlanController::class,'store'])->name('plan.detail.store');
Route::get('details/plan/{url}/edit/{id}',[DetailPlanController::class,'edit'])->name('plan.detail.edit');
Route::put('details/plan/{url}/update/{id}',[DetailPlanController::class,'update'])->name('plan.detail.update');
Route::delete('details/plan/{url}/destroy/{id}',[DetailPlanController::class,'destroy'])->name('plan.detail.destroy');

#Profile
Route::resource('profile',ProfileController::class);
Route::match(['get', 'post'],'profile/filter',[ProfileController::class,'filter'])->name("profile.filter");

#Permission
Route::resource('permission',PermissionController::class);
Route::match(['get', 'post'],'permission/filter',[PermissionController::class,'filter'])->name("permission.filter");


#profile X permission
Route::get('profile/{id}/permission',[PermissionProfileController::class,'permission'])->name('profile.permission');
Route::match(['get','post'],'profile/{id}/permission/create',[PermissionProfileController::class,'permissionAvailable'])->name('profile.permission.available');
Route::post('profile/{id}/permission/store',[PermissionProfileController::class,'attachpermissionprofile'])->name('profile.permission.attach');
Route::get('profile/{id}/permission/{idpermission}/detach',[PermissionProfileController::class,'detachpermissionprofile'])->name('profile.permission.detach');
Route::get('admin',[AdminController::class,'index'])->name('admin.index');

#plan X profile
Route::get('plan/{id}/profile',[PlanProfileController::class,'profile'])->name('plan.profile');
Route::match(['get','post'],'plan/{id}/profile/create',[PlanProfileController::class,'profileAvailable'])->name('plan.profile.available');
Route::post('plan/{id}/profile/store',[PlanProfileController::class,'attachplanprofile'])->name('plan.profile.attach');
Route::get('plan/{id}/profile/{idpermission}/detach',[PlanProfileController::class,'detachplanprofile'])->name('plan.profile.detach');


#user
Route::resource('user',UserController::class);
Route::match(['get', 'post'],'user/filter',[UserController::class,'filter'])->name("user.filter");


#category
Route::resource('category',CategoryController::class);
Route::match(['get', 'post'],'category/filter',[CategoryController::class,'filter'])->name("category.filter");


#produtos
Route::resource('product',ProductController::class);
Route::match(['get', 'post'],'product/filter',[ProductController::class,'filter'])->name("product.filter");

#produtos X categoria
Route::get('product/{id}/category',[CategoryProductController::class,'categories'])->name('product.category');
Route::match(['get','post'],'product/{id}/category/create',[CategoryProductController::class,'categoryAvailable'])->name('product.category.available');
Route::post('product/{id}/category/store',[CategoryProductController::class,'attachcategoryproduct'])->name('product.category.attach');
Route::get('product/{id}/category/{idpermission}/detach',[CategoryProductController::class,'detachcategoryproduct'])->name('product.category.detach');

#produtos
Route::resource('table',TableController::class);
Route::match(['get', 'post'],'table/filter',[TableController::class,'filter'])->name("table.filter");

#Tenant
Route::get('tenant',[TenantController::class,'index'])->name('tenant.index');
Route::get('Tenant/{uuid}/show',[TenantController::class,'show'])->name('tenant.show');
Route::get('Tenant/{uuid}/edit',[TenantController::class,'edit'])->name('tenant.edit');
Route::put('Tenant/{uuid}/update',[TenantController::class,'update'])->name('tenant.update');


#Role
Route::resource('role',RoleController::class);
Route::match(['get', 'post'],'role/filter',[RoleController::class,'filter'])->name("role.filter");


});





Route::get('Larafood/plan/{url}',[SiteController::class,'plan'])->name('plan.subscription');
Route::get('Larafood/home',[SiteController::class,'index'])->name('site.home');
# rotas de fallback
Route::fallback(function(){return redirect()->route('site.home');});
Auth::routes();

Route::get('/test',function()
{

  dd(auth()->user()->isAdmin());
});
