<?php

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
Route::get('/slider', [SliderController::class, 'index']);
Route::get('/slider/create', [SliderController::class, 'create']);
