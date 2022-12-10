<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeConTroller;
use App\Http\Controllers\SocialConTroller;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

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


Route::get('/page-admin', [AdminController::class, 'index']);
Route::get('/page-login', function () {
    return view('custom_page.page_login');
});
Route::post('post-login', [HomeConTroller::class, 'post_login']);


Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', [HomeConTroller::class, 'index']);
    Route::get('log-out', [HomeConTroller::class, 'log_out']);
});
