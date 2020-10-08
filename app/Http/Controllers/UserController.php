<?php

namespace App\Http\Controllers;

use App\Models\model_has_role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getDanhSach(){
        $users = User::all();
        $model_has_roles = model_has_role::all();
        return view('admin.user.danhsach',['users'=>$users,'model_has_roles'=>$model_has_roles]);
    }

    public function xoa($idUser){
        $user = User::find($idUser);
        $user->delete();
        return redirect('admin/user/danhsach')->with('success','đã xóa user');
    }

    public function getSua($idUser){
        $user = User::find($idUser);
        $model_has_roles = model_has_role::all();
        return view('admin.user.sua',['user'=>$user,'model_has_roles'=>$model_has_roles]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3'
            
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải nhiều hơn ba kí tự'

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->updated_at = Carbon::now();
        if($request->changePassword == 'on'){
            $this->validate($request,[
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
            ],[
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất ba kí tự',
                'password.max' => 'Mật khẩu chỉ được nhất 32 kí tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khấu',
    
                'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
            ]);
            $user->password = bcrypt($request->password);
        }
        //$model_has_roles = model_has_role::all();
        if($request->quyen == 'nguoidung'){
            $model_has_roles = model_has_role::where('model_id','=',$user->id)->delete();
            $model_has_role_curent = new model_has_role();
            $model_has_role_curent->role_id = 2;
            $model_has_role_curent->model_type = 'App\Models\User';
            $model_has_role_curent->model_id = $user->id;

            $model_has_role_curent->save();
        }if($request->quyen == 'admin'){
            $model_has_roles = model_has_role::where('model_id','=',$user->id)->delete();
            $model_has_role_curent = new model_has_role();
            $model_has_role_curent->role_id = 1;
            $model_has_role_curent->model_type = 'App\Models\User';
            $model_has_role_curent->model_id = $user->id;

            $model_has_role_curent->save();
        }

        $user->save();

        return redirect('admin/user/sua/'.$id)->with('suathanhcong','sửa user thành công');
    }

    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(REQUEST $request){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email'=>'required|max:255|min:10|regex: (^[a-z][a-z0-9_\.]{0,32}@vmo.vn$)|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải nhiều hơn ba kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.regex' => 'Bạn chưa nhập đúng định dạng email yêu cầu',
            'email.unique' => 'Email đã tồn tại',
            'email.required'=>'Bạn chưa nhập email',
            'email.min'=>'Tên email quá ngắn',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất ba kí tự',
            'password.max' => 'Mật khẩu chỉ được nhất 32 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khấu',
            'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        //$user->quyen = $request->quyen;

        $user->save();

        if($request->quyen == 'nguoidung'){
            $model_has_roles = new model_has_role();
            $model_has_roles->role_id = 2;
            $model_has_roles->model_type = 'App\Models\User';
            $model_has_roles->model_id = $user->id;

            $model_has_roles->save();
        }if($request->quyen == 'admin'){
            $model_has_roles = new model_has_role();
            $model_has_roles->role_id = 1;
            $model_has_roles->model_type = 'App\Models\User';
            $model_has_roles->model_id = $user->id;

            $model_has_roles->save();
        }
        return redirect('admin/user/them')->with('themthanhcong','thêm user thành công');
        }
    public function getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,
    	[
    		'email'=>'required|max:255|regex: (^[a-z][a-z0-9_\.]{2,32}@vmo.vn$)',
    		'password'=>'required|min:3|max:18'
    	]
    	,[
    		'email.required'=>'Bạn chưa nhập email',
    		'email.regex'=>'Sai email hoặc mật khẩu',
    		'password.required'=>'Bạn chưa nhập Password',
    		'password.min'=>'Password không được ít hơn 3 ký tự',
    		'password.max'=>'Password không được nhiều hơn 18 ký tự'

    	]);

   
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    	{
    		return redirect('admin/post/danhsachchuaduyet');
    	}
    	else{
    		return redirect('admin/login')->with('thongbao','Đăng nhập thất bại');
    		
    	}
    }

       public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/login');

    }
}
