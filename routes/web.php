<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponeController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderReturnController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CartPageController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    $id = Auth::user() -> id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
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


/**
 *  sub-> Categoery wise product search
 *  sub-> SubCategoery wise product search
 */
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCategoryWiseProduct']);
Route::get('subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCategoryWiseProduct']);



/**
 *   product view modal
 */
Route::get('product/view/modal/{id}', [IndexController::class, 'ProductViewModal']);


/**
 *   Add to Cart routes
 */
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);



/**
 *   Add to Mini cart routes
 */
Route::get('/product/mini/cart/', [CartController::class, 'MiniCart']);


/**
 *   Remove product from Mini cart routes
 */
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveProductMiniCart']);


/**
 *      Manage wishlist & mycart products
 *      User middleware for Security
 *      without login can not access these routes
 */
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishlist']);

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function(){
    
    // wishlist routes
    Route::get('/wishlist-product', [WishlistController::class, 'ViweWishlistProduct']) -> name('wishlist-product');
    Route::get('/wishlist-product-show', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist/product-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    // my Order routes
    Route::get('/my/orders', [AllUserController::class, 'MyOrders']) -> name('my.order');
    Route::get('/order-details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice-download/{order_id}', [AllUserController::class, 'InvoiceDownload']);


    // Payment Routes 
    Route::post('/stripe-order', [StripeController::class, 'StripeOrder']) -> name('stripe.order');
    Route::post('/cash-order', [CashController::class, 'CashOrder']) -> name('cash.order');


    // order return or canceld
    Route::post('/order/return/{order_id}', [AllUserController::class, 'UserOrderReturn']) -> name('order.return');
    Route::get('/order/return-list', [AllUserController::class, 'UserOrderReturnList']) -> name('return.order.list');
    Route::get('/order/cancel', [AllUserController::class, 'UserOrderCancel']) -> name('order.cancel');


    

});


    // user my Cart routes
    Route::get('/cart-product', [CartPageController::class, 'ViweCartProduct']) -> name('cart-product');
    Route::get('/user/cart-product-show', [CartPageController::class, 'GetCartProduct']);
    Route::get('/user/cart/product-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

    Route::post('/cart-product-increment/{rowId}', [CartPageController::class, 'cartProductIncrement']);
    Route::post('/cart-product-decrement/{rowId}', [CartPageController::class, 'cartProductDecrement']);




/**
 *  Admin Coupone manage Routes
 */
Route::prefix('coupone') -> group(function(){

    Route::get('/view', [CouponeController::class, 'CouponeView']) -> name('manage-coupone');
    Route::get('/delete/{id}', [CouponeController::class, 'CouponeDelete']) -> name('coupone.delete');
    Route::get('/edit/{id}', [CouponeController::class, 'CouponeEdit']) -> name('coupone.edit');
    Route::post('/store', [CouponeController::class, 'CouponetStore']) -> name('coupone.store');
    Route::patch('/update/{id}', [CouponeController::class, 'CouponeUpdate']) -> name('coupone.update');

}) ;




/**
 *  user Shipping manage Routes
 */
Route::prefix('shipping') -> group(function(){


    // Divivsion manage
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView']) -> name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore']) -> name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit']) -> name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate']) -> name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete']) -> name('division.delete');

    // District manage
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView']) -> name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore']) -> name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit']) -> name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate']) -> name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete']) -> name('district.delete');


    // State manage
    Route::get('/state/view', [ShippingAreaController::class, 'StateView']) -> name('manage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore']) -> name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit']) -> name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate']) -> name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete']) -> name('state.delete');

    // district select baseed on division selected
    Route::get('/division/ajax/{id}', [ShippingAreaController::class, 'GetDistrictByDivision']);
    Route::get('/district/ajax/{district_id}', [ShippingAreaController::class, 'GetStateByDistrict']);


}) ;



/**
 *  user Coupon Apply
 */
Route::post('/coupon-apply', [CartController::class, 'CouponeApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponeCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponeRemove']);


/**
 *  user Checkout routes
 */
Route::get('/checkout', [CheckoutController::class, 'ViewCheckout']) -> name('view.checkout');
Route::post('/checkout-store', [CheckoutController::class, 'CheckoutStore']) -> name('store.checkout');



/**
 *  Admin Coupone manage Routes
 */
Route::prefix('orders') -> group(function(){

    Route::get('/pendding', [OrderController::class, 'PenddingOrder']) -> name('pendding-order');
    Route::get('/pendding/details/{order_id}', [OrderController::class, 'PenddingOrderDetails']) -> name('pendding.order.details');
    Route::get('/confirmed', [OrderController::class, 'ConfirmedOrder']) -> name('confirmed-order');
    Route::get('/processing', [OrderController::class, 'ProcessingOrder']) -> name('processing-order');
    Route::get('/picked', [OrderController::class, 'PickedOrder']) -> name('picked-order');
    Route::get('/shipped', [OrderController::class, 'shippedOrder']) -> name('shipped-order');
    Route::get('/delivered', [OrderController::class, 'DeliveredOrder']) -> name('delivered-order');
    Route::get('/canceled', [OrderController::class, 'CanceledOrder']) -> name('canceled-order');

    // Update order status
    Route::get('/confirmed/{order_id}', [OrderController::class, 'StatusConfirmed']) -> name('order.confirmed');
    Route::get('/processing/{order_id}', [OrderController::class, 'StatusProcessing']) -> name('order.processing');
    Route::get('/picked/{order_id}', [OrderController::class, 'StatusPicked']) -> name('order.picked');
    Route::get('/shipped/{order_id}', [OrderController::class, 'StatusShipped']) -> name('order.shipped');
    Route::get('/delivered/{order_id}', [OrderController::class, 'StatusDelivered']) -> name('order.delivered');
    Route::get('/canceled/{order_id}', [OrderController::class, 'StatusCanceled']) -> name('order.canceled');

    Route::get('/admin/invoice/{order_id}', [OrderController::class, 'AdminOrderInvoice']);

});



/**
 *  Admin Reports Routes
 */

Route::prefix('reports') -> group(function(){

    Route::get('/view', [ReportController::class, 'ReportView']) -> name('all-reports');
    Route::post('/show/date', [ReportController::class, 'ReportShowByDate']) -> name('report.show');
    Route::post('/show/month/Year', [ReportController::class, 'ReportShowByMonthYear']) -> name('report.month.year');
    Route::post('/show/Year', [ReportController::class, 'ReportShowByYear']) -> name('report.year');
    
});



// all user show to admin panel
Route::prefix('users') -> group(function(){

    Route::get('/all', [AdminProfileController::class, 'AllUserShow']) -> name('all-user');

});


/**
 *  Blog routes
 */
Route::prefix('blog') -> group(function(){

    Route::get('/category/show', [BlogController::class, 'BlogCategroyShow']) -> name('blog.category.view');
    Route::post('/category/store', [BlogController::class, 'BlogCategroyStore']) -> name('blog.category.store');
    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategroyEdit']) -> name('blog.category.edit');
    Route::post('/category/update/{id}', [BlogController::class, 'BlogCategroyUpdate']) -> name('blog.category.update');
    Route::get('/category/delete/{id}', [BlogController::class, 'BlogCategroyDelete']) -> name('blog.category.delete');


    // Admin Blog post
    Route::get('/post/add', [BlogController::class, 'AddBlogPost']) -> name('post.add');
    Route::get('/post/list', [BlogController::class, 'ListBlogPost']) -> name('post.list');
    Route::post('/post/store', [BlogController::class, 'StoreBlogPost']) -> name('post.store');

});


// frontend blog rotues
Route::get('home/blog', [HomeBlogController::class, 'BlogView']) -> name('home.blog');
Route::get('home/blog/details/{id}', [HomeBlogController::class, 'BlogViewDetails']) -> name('post.details');
Route::get('home/blog/category/post/{category_id}', [HomeBlogController::class, 'BlogPostCategory']);


/**
 *  Adming Site Setting routes
 */
Route::prefix('siteSetting') -> group(function(){
    Route::get('/update', [SiteSettingController::class, 'SiteSettingUpdate']) -> name('site.setting');
    Route::post('/update', [SiteSettingController::class, 'SiteSettingUpdateNow']) -> name('site.setting.update');

    // seo routes
    Route::get('/seo', [SiteSettingController::class, 'SeoSetting']) -> name('seo.setting');
    Route::post('/update/seo', [SiteSettingController::class, 'SeoSettingUpdate']) -> name('seo.setting.update');


});




/**
 *  Adming Return Order routes
 */
Route::prefix('return') -> group(function(){

    Route::get('/admin/rquests', [OrderReturnController::class, 'OrderReturnRequest']) -> name('return.request');
    Route::get('/admin/order/approve/{order_id}', [OrderReturnController::class, 'OrderReturnRequestApprove']) -> name('return.order.approve');
    Route::get('/admin/all/order/approve', [OrderReturnController::class, 'AllApproveReturnOrder']) -> name('all.approve.request');

});







