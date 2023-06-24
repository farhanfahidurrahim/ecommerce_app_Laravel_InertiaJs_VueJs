<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
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

//=========>>> Auth Section <<<=========
Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});
Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('register.store');
Route::post('/login-store', [AuthController::class, 'loginStore'])->name('login.store');


//=========>>> Frontend Section <<<=========
// Route::get('/', function () { return inertia('Frontend/Index'); });
Route::get('/', [FrontendController::class, 'index']);
Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/shop-product-detail', [FrontendController::class, 'shopProductDetail']);

//Cart Section
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-cart/{product_id}', [CartController::class, 'addCart'])->name('add.cart');

//=========>>> Admin Section <<<=========
// Route::redirect('/', '/dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard']);

//Slider  Section
Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SliderController::class, 'create']);
Route::post('/slider/store', [SliderController::class, 'store']);
Route::get('/slider/{id}/edit', [SliderController::class, 'edit']);
Route::post('/slider/{id}/update', [SliderController::class, 'update']);
Route::post('/slider/{id}/delete', [SliderController::class, 'destroy']);

//Brand  Section
Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create']);
Route::post('brand/store', [BrandController::class, 'store']);
Route::get('brand/{id}/edit', [BrandController::class, 'edit']);
Route::post('brand/{id}/update', [BrandController::class, 'update']);
Route::post('brand/{id}/delete', [BrandController::class, 'destroy']);

//Category  Section
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::post('/category/{id}/update', [CategoryController::class, 'update']);
Route::post('/category/{id}/delete', [CategoryController::class, 'destroy']);

//Product  Section
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::post('/product/{id}/update', [ProductController::class, 'update']);
Route::post('/product/{id}/delete', [ProductController::class, 'destroy']);
