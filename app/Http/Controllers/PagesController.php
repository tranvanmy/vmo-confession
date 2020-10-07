<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
    
{
    function getDangnhap(){
    	return view('pages.dangnhap');
    }

    function postDangnhap(Request $request){
      	$this->validate($request,
    	[
    		'email'=>'required|max:255|regex: (^[a-z][a-z0-9_\.]{2,32}@vmo.vn$)',
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
        $user = Auth::user();
        return view('pages.nguoidung',['nguoidung'=>$user]);
   }

   function postNguoiDung(Request $request){
    $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|max:255|regex: (^[a-z][a-z0-9_\.]{3,32}@vmo.vn$)',
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
        //$user->save();
        return redirect('nguoidung')->with('thongbao','sửa thành công');

    }
    public function getHomePage()
    {
        
        $post = Post::where('published','1')->orderBy('published_at','DESC')->paginate(5);
		// $post = Post::all();
        
        return view('pages.trangchu',['posthome'=>$post]);
    }
    public function getSearch(Request $request)
    {
        $keyword = $request->keyword;
        $id_category = $request->category;

        if($request->category == 0){

            // $post = Post::where('published',1)->where('title','like',"%$keyword%")
            // ->orwhere('content','like',"%$keyword%")->orderBy('published','DESC')->take(30)->paginate(10);
            $post = Post::where(function($query) use ($keyword){
                $query->where('published',1)
                    ->where('title','like',"%$keyword%");
            })->orwhere(function($query) use ($keyword) {
                $query->where('published',1)
                    ->where('title','like',"%$keyword%");
            })->orderBy('published_at','DESC')->take(30)->paginate(10);
        }else{
            // $post = Category::find($request->category)->post()->where('title','like',"%$keyword%")
            // // ->orwhere('content','like',"%$keyword%")
            // ->get();
            $post = Post::where(function($query) use ($keyword,$id_category){
                    $query->where('title','like',"%$keyword%")
                    ->where('published',1)
                    ->whereHas('category',function($query) use ($id_category){
                        $query->where('id',$id_category);
                    });
                })->orwhere(function($query) use ($keyword,$id_category){
                $query->where('content','like',"%$keyword%")
                ->where('published',1)
                ->whereHas('category',function($query) use ($id_category){
                    $query->where('id',$id_category);
                });
            })->orderBy('published_at','DESC')->take(30)->paginate(10);
           
            
        }
   
        return view('pages.search',['keyword'=>$keyword,'post'=>$post]);
        // return view('pages.demo');
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
    public function getPostbyCategory($id_category)
    { 
        // $post = Category::find($id_category)->post->where('published',1)
        // ->orderBy('published_at','DESC')->get()->paginate(10);
        $post = Post::where(function($query)use ($id_category) {
            $query->where('published',1)
            ->whereHas('category',function($query) use ($id_category) {
                $query->where('id',$id_category);
            });
        })->take(100)->paginate(10);
        $categoryPost = Category::find($id_category);
        return view('pages.PostByCategory',['post'=>$post, 'categoryPost'=>$categoryPost]);
    }
    // Top like

    public function getTopLike()
    {
        $post = Post::withCount(['likes'=>function($query){
            $query->where('likeable_type','App\Models\Post')
            ->where('value',1);
        }])->orderBy('likes_count','DESC')->paginate(6);
        
        return view('pages.topLike',['posthome'=>$post]);
		
    }

    //Top comment
    public function getTopComment()
    {
        $post = Post::withCount('comments')->orderBy('comments_count','DESC')->paginate(6);
        
        return view('pages.topComment',['posthome'=>$post]);
		
    }
    //Top Vote
    public function getTopVote()
    {
        $post = Post::withCount('votes')->orderBy('votes_count','DESC')->paginate(6);

        return view('pages.topVote',['posthome'=>$post]);
		
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/post/danhsachdaduyet');

    }


    public function getContact()
    {
        return view('pages.contact');
    }

    // Introduct
    public function getIntroduct()
    {
        return view('pages.introduce');

    }
}
