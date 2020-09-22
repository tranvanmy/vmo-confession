<?php


use App\Http\Controllers\ChiTietBaiPostController;

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;





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

Route::get('dangnhap',[PagesController::class,'getDangnhap']);
Route::post('dangnhap',[PagesController::class,'postDangnhap']);


Route::get('homepage', [PagesController::class,'getHomePage']);
Route::post('search', [PagesController::class,'getSearch']);
Route::post('Post', [PagesController::class,'Post']);

Route::get('dangxuat',[PagesController::class,'getDangXuat']);

Route::get('chitietbaipost/{id}',[ChiTietBaiPostController::class,'getChitiet']);

Route::get('nguoidung',[PagesController::class,'getNguoiDung']);
Route::post('nguoidung',[PagesController::class,'postNguoiDung']);



