<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
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
// Route::get('/', function () {
//     return inertia(component:'Welcome');
// });

Route::redirect('/', '/dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SliderController::class, 'create']);
Route::post('/slider/store', [SliderController::class, 'store']);
Route::get('/slider/{id}/edit', [SliderController::class, 'edit']);
Route::post('/slider/{id}/update', [SliderController::class, 'update']);
Route::post('/slider/{id}/delete', [SliderController::class, 'destroy']);

Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create']);
Route::post('brand/store', [BrandController::class, 'store']);
