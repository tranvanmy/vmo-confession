<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Database\QueryException;



class UserController extends Controller
{
    public function getDangnhapAdmin()
    {
    	return view('admin/login');
    }

    public function postDangnhapAdmin()
    {
    	$this->validate($request,
    	[
    		'email'=>'required',
    		'password'=>'required|min:3|max:18'
    	]
    	,[
    		'email.required'=>'Bạn chưa nhập Email',
    		'password.required'=>'Bạn chưa nhập Password',
    		'password.min'=>'Password không được ít hơn 3 ký tự',
    		'password.max'=>'Password không được nhiều hơn 18 ký tự'

    	]);

    	// if()
    	if(Auth::attemp(['email'=>$request->email,'password'=>$request->password]))
    	{
    		return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thành công');
    	}
    	else{
    		return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
    		
    	}
    }

    public function getDangXuatAdmin(){
    Auth::logout();
            return redirect('admin/dangnhap');
}


   }

