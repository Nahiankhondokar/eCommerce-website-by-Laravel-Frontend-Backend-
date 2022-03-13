<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
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
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
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



