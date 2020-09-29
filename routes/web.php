<?php


use App\Http\Controllers\ChiTietBaiPostController;

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ForgotPassword;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;



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

Route::get('forgot_password',[ForgotPassword::class,'forgot'])->name('get.reset.password');
Route::post('forgot_password',[ForgotPassword::class,'sendcodepassword']);
Route::get('reset_password',[ForgotPassword::class,'resetPassword']);






Route::post('search', [PagesController::class,'getSearch']);
Route::post('Post', [PagesController::class,'Post']);


Route::get('dangxuat',[PagesController::class,'getDangXuat']);

Route::get('nguoidung',[PagesController::class,'getNguoiDung'])->middleware('loginmiddleware');
Route::post('nguoidung',[PagesController::class,'postNguoiDung']);



Route::get('homepage', [PagesController::class,'getHomePage'])->middleware('loginmiddleware');



Route::get('chitietbaipost/{id}',[ChiTietBaiPostController::class,'getChitiet'])->middleware('loginmiddleware');

Route::get('auth/google/url',[GoogleController::class,'loginUrl'])->name('login.google');
Route::get('auth/google/callback',[GoogleController::class,'loginCallback']);


Route::get('dangnhapadmin',[PagesController::class,'getDangnhapAdmin']);
Route::post('dangnhapadmin',[PagesController::class,'postDangnhapAdmin']);


