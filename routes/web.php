<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeConTroller;
use App\Http\Controllers\NganHangController;
use App\Http\Controllers\PhongGiaoDichController;
use App\Http\Controllers\SocialConTroller;
use App\Http\Controllers\TheAtmController;
use App\Http\Controllers\TruAtmController;
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



Route::get('/index', function () {
    return view('custom_page.index');
});
Route::get('/page-login', function () {
    return view('custom_page.page_login');
});
Route::post('post-login', [HomeConTroller::class, 'post_login']);



Route::get('/page-admin/nganhang',[NganHangController::class,'index']);

Route::post('/page-admin/nganhang/update',[NganHangController::class,'update']);

Route::get('/', [HomeConTroller::class, 'index']);
Route::get('/list-bank', [HomeConTroller::class, 'list_bank']);


Route::get('/page-admin/nganhang/delete/{id}',[NganHangController::class,'delete']);

//////////////////////////////////////////////////////////////
Route::get('/page-admin/phonggiaodich',[PhongGiaoDichController::class,'index']);

Route::post('/page-admin/phonggiaodich/update',[PhongGiaoDichController::class,'update']);

Route::get('/page-admin/phonggiaodich/delete/{id}',[PhongGiaoDichController::class,'delete']);
/////////////////////////////////////////////////////
Route::get('/page-admin/truatm',[TruAtmController::class,'index']);

Route::post('/page-admin/truatm/update',[TruAtmController::class,'update']);

Route::get('/page-admin/truatm/delete/{id}',[TruAtmController::class,'delete']);
//////////////////////////////////////////////////////
Route::get('/page-admin/theatm',[TheAtmController::class,'index']);

Route::post('/page-admin/theatm/update',[TheAtmController::class,'update']);

Route::get('/page-admin/theatm/delete/{id}',[TheAtmController::class,'delete']);

Route::get('page-admin/logout',[AdminController::class,'logout']);
Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/page-admin/log-out', [HomeConTroller::class, 'log_out']);
    Route::get('/page-admin/nganhang',[NganHangController::class,'index']);
    Route::post('/page-admin/nganhang/update',[NganHangController::class,'update']);
    Route::get('log-out', [HomeConTroller::class, 'log_out']);  
});
