<?php

use App\Http\Controllers\AjaxLikeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChiTietBaiPostController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThongKeController;
use Spatie\Permission\Contracts\Role;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

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


Route::get('homepage', [PagesController::class,'getHomePage'])->middleware('loginmiddleware');
Route::post('search', [PagesController::class,'getSearch']);
Route::post('Post', [PagesController::class,'Post']);
Route::get("PostbyCategory/{id}", [PagesController::class,'getPostbyCategory']); 
Route::post('vote/{idpost}', [AjaxLikeController::class,'postVote']);
Route::get('toplike', [PagesController::class,'getTopLike']);
Route::get('topcomment', [PagesController::class,'getTopComment']);
Route::get('topvote', [PagesController::class,'getTopVote']);


Route::get('dangxuat',[PagesController::class,'getDangXuat']);



Route::get('nguoidung',[PagesController::class,'getNguoiDung'])->middleware('loginmiddleware');
Route::post('nguoidung',[PagesController::class,'postNguoiDung']);

Route::get('chitietbaipost/{id}',[ChiTietBaiPostController::class,'getChitiet'])->middleware('loginmiddleware');
Route::post('comment/{id}',[ChiTietBaiPostController::class,'postComment']);
Route::post('repcomment/{idcm}/{idpost}',[ChiTietBaiPostController::class,'postRepComment']);

Route::get('like/{id}',[AjaxLikeController::class,'getLike']);
Route::get('dalike/{id}',[AjaxLikeController::class,'getDaLike']);

Route::get('dislike/{id}',[AjaxLikeController::class,'getdisLike']);
Route::get('dadislike/{id}',[AjaxLikeController::class,'getDadisLike']);

Route::get('likecomment/{id}',[AjaxLikeController::class,'getLikeComment']);
Route::get('dalikecomment/{id}',[AjaxLikeController::class,'getDaLikeComment']);

Route::get('dislikecomment/{id}',[AjaxLikeController::class,'getdisLikeComment']);
Route::get('dadislikecomment/{id}',[AjaxLikeController::class,'getDadisLikeComment']);

Route::get('likecommentrep/{id}',[AjaxLikeController::class,'getLikeCommentRep']);
Route::get('dalikecommentrep/{id}',[AjaxLikeController::class,'getDaLikeCommentRep']);

Route::get('dislikecommentrep/{id}',[AjaxLikeController::class,'getdisLikeCommentRep']);
Route::get('dadislikecommentrep/{id}',[AjaxLikeController::class,'getDadisLikeCommentRep']);

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    Route::group(['prefix'=>'post'],function(){
        Route::get('danhsachchuaduyet',[PostController::class,'getDanhSachChuaDuyet']);
        Route::get('danhsachdaduyet',[PostController::class,'getDanhSachDaDuyet']);
        Route::get('xoa/{danhsachdaduyet}/{id}',[PostController::class,'getXoa']);
        Route::get('publish/{id}',[PostController::class,'getPublish']);

        Route::get('them',[PostController::class,'getThem']);
        Route::post('them',[PostController::class,'postThem']);
    });
    Route::group(['prefix'=>'thongke'],function(){
        Route::get('baipost',[ThongKeController::class,'getThongKeBaiPost']);
        Route::post('baiposttrave',[ThongKeController::class,'getBaiPostTrave']);
    });
    Route::group(['prefix'=>'category'],function(){
        Route::get('danhsach',[CategoryController::class,'getDanhSach']);
        Route::get('xoa/{id}',[CategoryController::class,'getXoa']);
        Route::get('sua/{id}',[CategoryController::class,'getSua']);
        Route::post('sua/{id}',[CategoryController::class,'postSua']);
        Route::get('them',[CategoryController::class,'getThem']);
        Route::post('them',[CategoryController::class,'postThem']);
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach',[UserController::class,'getDanhSach']);
        Route::get('xoa/{id}',[UserController::class,'xoa']);
        Route::get('sua/{id}',[UserController::class,'getSua']);
        Route::post('sua/{id}',[UserController::class,'postSua']);
        Route::get('them',[UserController::class,'getThem']);
        Route::post('them',[UserController::class,'postThem']);
    });
});
Route::get('admin/login',[UserController::class,'getLogin']);
Route::post('admin/login',[UserController::class,'postLogin']);

