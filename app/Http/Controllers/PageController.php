<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PageController extends Controller
{
    public function getHomePage()
    {
        return view('pages.trangchu');
    }
    public function getSearch(Request $request)
    {
        $keyword = $request->keyword;
        $post = Post::where('title','like',"%$keyword%")->orwhere('content','like',"%$keyword%")->take(30)->paginate(10);
   
        return view('pages.search',['keyword'=>$keyword,'post'=>$post]);
    }
}
