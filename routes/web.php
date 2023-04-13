<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PagesController;
use App\http\Controllers\CustomesUserController;
use App\http\Controllers\CategoriesController;
use App\http\Controllers\SubCategoriesController;
use App\http\Controllers\ChildCategoriesController;
use App\http\Controllers\ProductsController;
use App\http\Controllers\BannersController;
use App\http\Controllers\BlogsController;
use App\http\Controllers\CheckoutsController;
use App\Http\Controllers\OrderControlller;

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

Route::get('/', [PagesController::class,'index']);
Route::get('/about', [PagesController::class,'about']);
Route::get('/cart', [PagesController::class,'cart']);
Route::get('/blogs',[BlogsController::class,'index']);
Route::get('/blogs/add',[BlogsController::class,'create']);
Route::post('/blogs/add', [BlogsController::class, 'store']);
Route::get('/blogs/{id}', [BlogsController::class, 'blogDetail']);
Route::get('/product/{id}', [PagesController::class,'productDetail']);
Route::post('/postreview/{id}', [ProductsController::class, 'postreview']);
Route::get('/collection/{id}', [PagesController::class, 'collection']);
// checkouts process
Route::get('/shipping', [CheckoutsController::class, 'shipping']);
Route::get('/payment', [CheckoutsController::class, 'payment']);
Route::get('/placeorder', [CheckoutsController::class, 'placeorder']);
Route::get('/order/{id}', [CheckoutsController::class, 'order']);
Route::get('/orderstore', [OrderControlller::class, 'orderstore']);
// checkouts process end
// esewa route
Route::any("/esewa/success",'EsweaController@success')->name('esewa.success');
Route::any("/esewa/fail",'EsweaController@fail')->name('esewa.fail');
// esewa route end
// custome user register
Route::post('/account/save', [CustomesUserController::class,'store']);
Route::post('/account/check', [CustomesUserController::class,'check']);
Route::get('/account/logout', [CustomesUserController::class,'logout']);
Route::get('/account/login', [CustomesUserController::class,'login']);
Route::get('/account/register', [CustomesUserController::class,'register']);
// custome user register end
Route::group(['middleware'=>['AuthCheck']],function(){
  Route::get('/user/dashboard', [PagesController::class,'userDashboard']);
  Route::get('orderdetail/{id}', [OrderControlller::class, 'detail']);
// route for profile update
Route::post('updateuserprofile/{id}',[CustomesUserController::class,'updateprofile']);
});
Route::group(['middleware'=>['Admincheck']],function(){
    Route::get('/admin/dashboard', [PagesController::class,'adminDashboard']);
    // crud operation for category
    Route::get('/admin/dashboard/category', [CategoriesController::class,'index']);
    Route::post('/admin/dashboard/add-category', [CategoriesController::class,'store']);
    Route::get('/admin/dashboard/delete-category/{id}', [CategoriesController::class, 'destroy']);
    Route::get('/admin/dashboard/updatecategorypage/{id}', [CategoriesController::class, 'updatepage']);
    Route::post('/admin/dashboard/update-category/{id}', [CategoriesController::class, 'update']);
// crud operation for category
    // crud operation for subcategory
    Route::get('/admin/dashboard/sub-category', [SubCategoriesController::class,'index']);
    Route::post('/admin/dashboard/add-subcategory', [SubCategoriesController::class,'store']);
    Route::get('/admin/dashboard/delete-subcategory/{id}', [SubCategoriesController::class, 'destroy']);
    Route::get('/admin/dashboard/edit-subcategory/{id}', [SubCategoriesController::class, 'updatepage']);
    Route::post('/admin/dashboard/update-subcategory/{id}',[SubCategoriesController::class, 'update']);
    // crud operation for subcategory

    // crud operation for child category
    Route::get('/admin/dashboard/child-category', [ChildCategoriesController::class, 'index']);
    Route::post('/admin/dashboard/add-childcategory', [ChildCategoriesController::class, 'addchildcategory']);
    Route::get('/admin/dashboard/delete-childcategory/{id}', [ChildCategoriesController::class, 'delete']);
    Route::get('/admin/dashboard/edit-childcategory/{id}', [ChildCategoriesController::class, 'edit']);
    Route::post('/admin/dashboard/update-childcategory/{id}',[ChildCategoriesController::class, 'update']);
    // crud operation for child category

    // product route
    Route::get('/admin/dashboard/product',[ProductsController::class,'index']);
    Route::get('/admin/dashboard/addProduct',[ProductsController::class,'addProductPage']);
    Route::post('/admin/dashboard/addProduct', [ProductsController::class, 'store']);
    Route::get('/admin/dashboard/deleteProduct/{id}', [ProductsController::class, 'destroy']);
    Route::get('/admin/dashboard/product/{id}', [ProductsController::class, 'productDetail']);
    Route::get('changeproductstatus/{id}', [ProductsController::class, 'changestatus']);
    Route::get('/admin/dashboard/editProduct/{id}', [ProductsController::class, 'edit']);
    Route::post('/admin/dashboard/updateProduct/{id}', [ProductsController::class, 'update']);
    Route::get('setfeature/{id}', [ProductsController::class, 'setfeature'] );
    // product route end

    // banner route
    Route::get('/admin/dashboard/banner',[BannersController::class,'index']);
    Route::get('/admin/dashboard/bannerCreate',[BannersController::class,'create']);
    Route::post('/admin/dashboard/addBanner', [BannersController::class, 'store']);
    Route::get('/changebannerstatus/{id}',[BannersController::class, 'updatestatus']);
    Route::get('admin/dashboard/editbanner/{id}',[BannersController::class, 'edit']);
    Route::post('/admin/dashboard/updateBanner/{id}', [BannersController::class, 'update']);
    Route::get('admin/dashboard/deletebanner/{id}', [BannersController::class, 'destroy']);
    // banner route end
    Route::get('/admin/dashboard/orders',[OrderControlller::class,'index']);
    Route::get('orderdetail/{id}', [OrderControlller::class, 'detail']);
    Route::get('changeorderstatus/{id}', [OrderControlller::class, 'changeorderstatus']);

    // user route
    Route::get('/admin/dashboard/user',[PagesController::class,'user']);
    Route::get('/checkout', [ProductsController::class, 'checkout']);

    // user route end
    // blog route
    Route::get('/admin/dashboard/blogs',[BlogsController::class,'listBlog']);
    Route::get('blog/delete/{id}', [BlogsController::class, 'destroy']);

    // blog route end

    //product filter route
    Route::get('/getproductlistbycategory/{id}', [ProductsController::class, 'productlistbycategory']);
    Route::get('/getactiveproductlist',[ProductsController::class, 'activeproductlist']);
    Route::get('/getinactiveproductlist',[ProductsController::class, 'inactiveproductlist']);
  });
