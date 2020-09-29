<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use Mail;
use Carbon\Carbon;


class ForgotPassword extends Controller
{
    public function forgot(){
    	
    		return view('pages.forgot');
    	
    }

    public function sendcodepassword(Request $request){


        $email = $request->email;
        $checkUser = User::where('email',$email)->first();

        if(!$checkUser)
        {
        	return redirect()->back()->with('error','email không tồn tại');
    	
        }
        $code = bcrypt(md5(time().$email));

        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

 


      Mail::send('pages.mailfb',$checkUser->toArray(), function($message) use ($checkUser){
	     
	        $message->to($checkUser->email,'Visitor')->subject('nhận code');
	    });
        return redirect()->back()->with('success','link lấy lại mật khẩu đã được gửi vào email của bạn');

  
    }
    public function resetPassword(){
    	return view('pages.resetpassword');
    }


     
}
