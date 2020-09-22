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
    		'email'=>'required|max:255|regex: (^[a-z][a-z0-9_\.]{5,32}@vmo.vn$)',
    		'password'=>'required|min:3|max:18'
    	]
    	,[
    		'email.required'=>'Bạn chưa nhập Email',
    		'email.regex'=>'Email không đúng định dạng công ty',
    		'password.required'=>'Bạn chưa nhập Password',
    		'password.min'=>'Password không được ít hơn 3 ký tự',
    		'password.max'=>'Password không được nhiều hơn 18 ký tự'

    	]);

   
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    	{
    		return redirect('homepage');
    	}
    	else{
    		return redirect('dangnhap')->with('thongbao','Đăng nhập thất bại');
    		
    	}
    }
    function getDangXuat()
    {
        Auth::logout();
        return redirect('homepage');
    }

   function getNguoiDung()
   {
        return view('pages.nguoidung');
   }

   function postNguoiDung(Request $request){
    $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|max:255|regex: (^[a-z][a-z0-9_\.]{5,32}@vmo.vn$)',
                'password'=>'required|min:3|max:18',
                'passwordAgain'=>'required|same:password'
        ]
        ,
        [
            'name.required'=>' Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự', 
            'email.required'=>'Bạn chưa nhập Email',
            'email.regex'=>'Email không đúng định dạng công ty',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password không được ít hơn 3 ký tự',
            'password.max'=>'Password không được nhiều hơn 18 ký tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
        
        ]);

   
        $user = Auth::user();
        $user->name = $request->name;
     
        $user->password = bcrypt($request->password);
        $user->save();
             return redirect('nguoidung')->with('thongbao','sửa thành công');

    }
}
