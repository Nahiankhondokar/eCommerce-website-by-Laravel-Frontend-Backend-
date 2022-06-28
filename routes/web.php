<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;

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



/**
 *  All Admin routes
 */
Route::middleware(['auth:admin']) -> group(function(){

    Route::middleware(['auth:sanctum,admin', 'verified']) -> get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    
    Route::get('admin/logout', [AdminController::class, 'destroy']) -> name('admin.logout');
    Route::get('admin/profile', [AdminProfileController::class, 'adminProfile']) -> name('admin.profile');
    Route::get('admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit']) -> name('admin.profile.edit');
    Route::post('admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate']) -> name('admin.profile.update');
    Route::get('admin/changePassword', [AdminProfileController::class, 'adminChangePassword']) -> name('admin.change.password');
    Route::post('admin/password/update', [AdminProfileController::class, 'adminPasswordUpdate']) -> name('admin.password.update');
    
});



/**
 *  All User routes 
 */

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'userLogout']) -> name('user.logout');
Route::get('/user/profile/edit', [IndexController::class, 'userProfileEdit']) -> name('user.profile.edit');
Route::post('/user/profile/update', [IndexController::class, 'userProfileUpdate']) -> name('user.profile.update');
Route::get('/user/password/change', [IndexController::class, 'userPasswordChange']) -> name('user.password.change');
Route::post('/user/password/update', [IndexController::class, 'userPasswordUpdate']) -> name('user.password.update');



/**
 *   All Brands Routes
 */
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
     Route::get('/sub/sub/edit/{subsubcat_id}/{category_id}', [SubCategoryController::class, 'SubSubCategoryEdit']) -> name('subsubcategory.edit');
     Route::put('/sub/sub/update/{id}', [SubCategoryController::class, 'SubSubCategoryUpdate']) -> name('subsubcategory.update');

     Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete']) -> name('subsubcategory.delete');




    /**
     * sub-category find for ....
     * sub-subCategory form or Product add form
     */
     Route::get('/sub/sub/ajax/{id}', [SubCategoryController::class, 'SubCategoryFind']);
     

});


 /**
  *  Admin Sub-SubCategory Edit Route
  *  Use Ajax for auto Select subcategory.
  */
Route::get('category/sub/sub/edit/ajax-update/{subsub}/{catid}', [SubCategoryController::class, 'SubCategoryFindUpdate']);



 /**
  *  Admin Products Routes
  * 
  */
  Route::prefix('/product') -> group(function(){

    Route::get('/', [ProductController::class, 'ProductView']) -> name('all.product');
    Route::get('/subcat/ajax/{id}', [ProductController::class, 'ProductSubCatFind']);
    Route::get('/subsubcat/ajax/{id}', [ProductController::class, 'ProductSubSubCatFind']);

    Route::post('/add', [ProductController::class, 'ProductAdd']) -> name('add.product');
    Route::get('/all', [ProductController::class, 'ProductManage']) -> name('manage.product');
    Route::get('/edit', [ProductController::class, 'ProductEdit']) -> name('edit.product');

    Route::get('/view/{id}', [ProductController::class, 'SingleProductView']) -> name('single.product');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit']) -> name('edit.product');
    Route::post('/update/{id}', [ProductController::class, 'ProductUpdate']) -> name('update.product');

    Route::post('/thambnail/update/', [ProductController::class, 'ProductThambnailUpdate']) -> name('thambnail.product');
    Route::post('/gallery/update/', [ProductController::class, 'ProductGalleryUpdate']) -> name('gallery.product');

    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete']) -> name('delete.product');

    Route::get('/active-inactive/{id}', [ProductController::class, 'ProductActiveInactive']) -> name('active.inactive.product');



  });


  /**
   *  Product Edit viwe page.
   *  Sub-category or sub-sub-category manage route
   */
  Route::get('product/edit/subcat/ajax/{id}', [ProductController::class, 'EditProductSubCatFind']);
  Route::get('product/edit/subsubcat/ajax/{id}', [ProductController::class, 'EditProductSubsubCatFind']);

 
/**
 *  Slider manage Routes
 */
Route::prefix('slider') -> group(function(){

    Route::get('/view', [SliderController::class, 'sliderView']) -> name('slider.view');
    Route::post('/store', [SliderController::class, 'SliderStore']) -> name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit']) -> name('slider.edit');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete']) -> name('slider.delete');
    Route::put('/update/{id}', [SliderController::class, 'SliderUpdate']) -> name('slider.update');

    Route::get('/active-inactive/{id}', [SliderController::class, 'sliderActiveInactive']) -> name('active.inactive.slider');

}) ;



/**
 *  Multiple Language Routes
 */
Route::get('language/english', [LanguageController::class, 'English']) -> name('language.english');
Route::get('language/hindi', [LanguageController::class, 'Hindi']) -> name('language.hindi');



/**
 *  Single product Details
 */
Route::get('single/product/{id}/{slug}', [IndexController::class, 'SingleProduct']);


/**
 *  TAg wise Product
 */
Route::get('product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);






