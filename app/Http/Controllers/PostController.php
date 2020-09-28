<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getDanhSachChuaDuyet(){
        $posts = Post::where('published','=',0)->get();
        return view('admin.post.danhsachchuaduyet',['posts'=>$posts]);
    }

    public function getDanhSachDaDuyet(){
        $posts = Post::where('published','=',1)->get();
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
}
