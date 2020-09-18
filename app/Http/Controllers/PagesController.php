<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PagesController extends Controller
    
{
    function getDangnhap(){
    	return view('pages.dangnhap');
    }

    function postDangnhap(Request $request){
      	$this->validate($request,
    	[
    		'email'=>'required|max:255|regex: (^[a-z][a-z0-9_\.]{5,32}@vmo.vn$)|unique:users',
    		'password'=>'required|min:3|max:18'
    	]
    	,[
    		'email.required'=>'Bạn chưa nhập Email',
    		'email.regex'=>'Email không đúng định dạng công ty',
    		'password.required'=>'Bạn chưa nhập Password',
    		'password.min'=>'Password không được ít hơn 3 ký tự',
    		'password.max'=>'Password không được nhiều hơn 18 ký tự'

    	]);

   
    	if(Auth::attemp(['email'=>$request->email,'password'=>$request->password]))
    	{
    		return redirect('dangnhap')->with('thongbao','Đăng nhập thành công');
    	}
    	else{
    		return redirect('dangnhap')->with('thongbao','Đăng nhập thất bại');
    		
    	}
    }
}
