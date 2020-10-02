<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getDanhSach(){
        $users = User::all();
        return view('admin.user.danhsach',['users'=>$users]);
    }

    public function xoa($idUser){
        $user = User::find($idUser);
        $user->delete();
        return redirect('admin/user/danhsach')->with('success','đã xóa user');
    }

    public function getSua($idUser){
        $user = User::find($idUser);
        return view('admin.user.sua',['user'=>$user]);
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

        return redirect('admin/user/them')->with('themthanhcong','thêm user thành công');
    }
}
