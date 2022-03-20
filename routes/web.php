<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

use App\Http\Controllers\Frontend\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Admin Routes for multi authentication
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store']) -> name('admin.login');
});



// All Admin Routes 
Route::middleware(['auth:sanctum,admin', 'verified']) -> get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('admin/logout', [AdminController::class, 'destroy']) -> name('admin.logout');
Route::get('admin/profile', [AdminProfileController::class, 'adminProfile']) -> name('admin.profile');
Route::get('admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit']) -> name('admin.profile.edit');
Route::post('admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate']) -> name('admin.profile.update');
Route::get('admin/changePassword', [AdminProfileController::class, 'adminChangePassword']) -> name('admin.change.password');
Route::post('admin/password/update', [AdminProfileController::class, 'adminPasswordUpdate']) -> name('admin.password.update');



// All User Routes 
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'userLogout']) -> name('user.logout');
Route::get('/user/profile/edit', [IndexController::class, 'userProfileEdit']) -> name('user.profile.edit');
Route::post('/user/profile/update', [IndexController::class, 'userProfileUpdate']) -> name('user.profile.update');
Route::get('/user/password/change', [IndexController::class, 'userPasswordChange']) -> name('user.password.change');
Route::post('/user/password/update', [IndexController::class, 'userPasswordUpdate']) -> name('user.password.update');



// All Admin Brand Routes
Route::prefix('brand') -> group(function(){

    Route::get('/view', [BrandController::class, 'brand_view']) -> name('all.brand');
    Route::post('/store', [BrandController::class, 'brand_store']) -> name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit']) -> name('brand.edit');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete']) -> name('brand.delete');
    Route::put('/update/{id}', [BrandController::class, 'BrandUpdate']) -> name('brand.update');

}) ;


// All Admin Category Routes
Route::prefix('category') -> group(function(){

    Route::get('/view', [CategoryController::class, 'CategoryView']) -> name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore']) -> name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit']) -> name('category.edit');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete']) -> name('category.delete');
    Route::put('/update/{id}', [CategoryController::class, 'CategoryUpdate']) -> name('category.update');


    // Admin All SubCategory
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView']) -> name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore']) -> name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit']) -> name('subcategory.edit');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete']) -> name('subcategory.delete');
    Route::put('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate']) -> name('subcategory.update');

     // Admin All Sub -> SubCategory
     Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView']) -> name('all.subsubcategory');
     Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore']) -> name('subsubcategory.store');



     

     Route::get('/sub/sub/ajax/{id}', [SubCategoryController::class, 'SubCategoryFind']);

}) ;



   

 


