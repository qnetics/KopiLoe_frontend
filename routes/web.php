<?php

use Illuminate\Support\Facades\Route;

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

// Admin Page Routes
Route::get('/dashboard',
    '\App\Http\Controllers\AdminControllers\AdminDashboardController@DashboardView')
    -> name('dashboard');

Route::get('/products',
    '\App\Http\Controllers\AdminControllers\AdminProductController@ProductView')
    -> name('products');

Route::post('/delete_product',
    '\App\Http\Controllers\AdminControllers\AdminProductController@DeleteProduct')
    -> name('delete_product');

Route::get('/edit_product',
    '\App\Http\Controllers\AdminControllers\AdminProductController@EditProductShow')
    -> name('edit_product_view');

Route::post('/edit_product',
    '\App\Http\Controllers\AdminControllers\AdminProductController@EditProduct')
    -> name('edit_product');


// add category
// add product
Route::get('/category',
    '\App\Http\Controllers\AdminControllers\CategoriesController@CategoriesView')
    -> name('categories');

Route::post('/category',
    '\App\Http\Controllers\AdminControllers\CategoriesController@AddCategory')
    -> name('add_category');


// add product
Route::get('/add_product',
    '\App\Http\Controllers\AdminControllers\AdminProductController@AddProductView')
    -> name('add_products');

Route::post('/add_product',
    '\App\Http\Controllers\AdminControllers\AdminProductController@AddNewProduct')
    -> name('add_new_product');


// Universal Page Routes
// Route::get('/login', '\App\Http\Controllers\LoginController@LoginView');

// User Page Routes
Route::get('/', '\App\Http\Controllers\UniversalControllers\IndexController@IndexView')->name('home');

Route::get('/login', '\App\Http\Controllers\UniversalControllers\IndexController@IndexView')->name('login');
Route::post('/login', '\App\Http\Controllers\UniversalControllers\IndexController@LoginView')->name('login');

Route::get('/register', '\App\Http\Controllers\UniversalControllers\IndexController@IndexView')->name('register');
Route::post('/register', '\App\Http\Controllers\UniversalControllers\IndexController@RegisterView')->name('register');

Route::get('/admin_register', '\App\Http\Controllers\AdminControllers\RegisterAdminController@RegisterAdminView')->name('admin_register_view');
Route::post('/admin_register', '\App\Http\Controllers\AdminControllers\RegisterAdminController@RegisterAdmin')->name('admin_register');

Route::get('/cart', '\App\Http\Controllers\UserControllers\CartController@CartView')->name('cart');
Route::post('/cart', '\App\Http\Controllers\UserControllers\CartController@AddCart')->name('add_to_cart');
Route::get('/update_cart', '\App\Http\Controllers\UserControllers\CartController@AddProductCart')->name('update_cart');
Route::post('/delete_cart', '\App\Http\Controllers\UserControllers\CartController@DeleteProductCart')->name('delete_cart');

Route::post('/add_order', '\App\Http\Controllers\UserControllers\OrderController@AddOrder')->name('add_to_order');

Route::post('/logout', '\App\Http\Controllers\UniversalControllers\LogoutController@Logout')->name('logout');

Route::get('/orders', '\App\Http\Controllers\AdminControllers\OrderController@OrderView')->name('order');
Route::get('/orders/user', '\App\Http\Controllers\UserControllers\OrderController@OrderView')->name('user_order');

Route::post('/approve_order', '\App\Http\Controllers\AdminControllers\OrderController@ApproveOrder')->name('approve');
Route::post('/delete_order', '\App\Http\Controllers\AdminControllers\OrderController@DeleteOrder')->name('admin_delete_order');

Route::get('/information', '\App\Http\Controllers\UserControllers\InformationController@InformationView')->name('order_information');
Route::get('/location', '\App\Http\Controllers\UserControllers\LocationController@LocationView')->name('user_location');
Route::post('/add_location', '\App\Http\Controllers\UserControllers\LocationController@AddLocation')->name('add_location');





Route::get('/about', function () {
    return view('UniversalPage.aboutProduct',[
    
        "message" => null,
        "failed"  => false,
        "type"    => null,
        "login_success" => false
    ]);
});

Route::get('/teams', function () {
    return view('UniversalPage.teams', [
    
        "message" => null,
        "failed"  => false,
        "type"    => null,
        "login_success" => false,

        "cart_active" => false
    ]);
});


Route::get('/profile', '\App\Http\Controllers\UniversalControllers\ProfileController@ShowProfile') -> name('profile');
Route::post('/edit_profile', '\App\Http\Controllers\UniversalControllers\ProfileController@EditProfile') -> name('edit_profile');