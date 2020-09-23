<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

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
    public function getHomePage()
    {
        $post = Post::where('published','1')->get();
		// $post = Post::all();
        
        return view('pages.trangchu',['post'=>$post]);
    }
    public function getSearch(Request $request)
    {
        $keyword = $request->keyword;
        if($request->category == 0){
            $post = Post::where('title','like',"%$keyword%")->orwhere('content','like',"%$keyword%")->take(30)->paginate(10);
        }else{
            $category=Category::find($request->category);
            $post = $category->post()->where('content','like',"%$keyword%")->get();
        }
   
        return view('pages.search',['keyword'=>$keyword,'post'=>$post]);
	}
	public function Post(Request $request)
	{
		$this->validate($request,
		[
			'category'=>'required',
			'title'=>'required|min:3',
			'content'=>'required|min:3'
		],
		[	'category.required'=>'mời bạn chọn thể loại bài đăng',
			'title'=>[
				'required'=>'Mời bạn nhập tiêu đề bài đăng',
				'min'=>'Tiêu đề phải nhiều hơn 2 kí tự'
			],
			'content'=>[
				'required'=>'Mời bạn nhập nội dung bài đăng',
				'min'=>'Nội dung bài đăng phải nhiều hơn 2 kí tự'
			],

		]);
		$post = new Post();
		$post->id_category =$request->category;
		$post->title = $request->title;
		$post->content = $request->content;
		$post->published = 0;

		$post->save();
		return redirect('homepage')->with('thongbao','Đăng bài thành công,Bạn hãy chờ duyệt');
	}
}
