<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getDanhSachChuaDuyet(){
        $posts = Post::where('published','=',0)->orderBy('created_at','DESC')->get();
        // $post = Post::withCount(['likes'=>function($query){
        //     $query->where('likeable_type','App\Models\Post')
        //     ->where('value',1);
        //}])->orderBy('likes_count','DESC')->paginate(6);
        return view('admin.post.danhsachchuaduyet',['posts'=>$posts]);
    }

    public function getDanhSachDaDuyet(){
        $posts = Post::where('published','=',1)->orderBy('published_at','DESC')->get();
        return View('admin.post.danhsachdaduyet',['posts'=>$posts]);
    }

    public function getXoa($danhsachduyet,$idPost){
        $post = Post::find($idPost);
        $post->delete();
        return redirect("admin/post/$danhsachduyet")->with('success','đã xóa bài post');
        //return view("admin.post.$danhsachduyet");
    }

    public function getPublish($idPost){
        $post = Post::find($idPost);
        $post->published = 1;
        $post->published_at = Carbon::now();

        $post->save();
        return redirect('admin/post/danhsachchuaduyet')->with('thongbao','publish thành công');
    }

    public function getThem(){
        $categories = Category::all();
        return view('admin.post.them',['categories'=>$categories]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'category'=>'required',
                'title'=>'required|min:3|unique:posts,title',
                'content'=>'required',
                'published'=>'required'
            ]
            ,[
                'category.required'=>'bạn chưa chọn chủ đề',
                'title.min'=>'tiêu đề cần ít nhất ba kí tự',
                'title.unique'=>'tiêu đề đã tồn tại',
                'content.required'=>'bạn chưa nhập nội dung',
                'published.required'=>'bạn chưa nhập trạng thái bài post'
            ]
        );

        $post = new Post();
        $post->id_category = $request->category;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->published = $request->published;
        //$post->published_at = $request->published_at;
        if($request->published == 1){
            $post->published_at = $request->published_at;
        }
        
        $post->save();
        return redirect('admin/post/them')->with('thongbao','thêm post thành công');
    }
}
