<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ChiTietBaiPostController extends Controller
{
    //
    public function getChitiet($id){
        $post = Post::find($id);

        $count_like = count($post->likes->where('value','=','1'));
        $count_dislike = count($post->likes->where('value','=','-1'));

        $total_point = 0;
        foreach($post->votes as $vote){
            $total_point = $total_point + $vote->point;
        }
        $rate = (float)($total_point/count($post->votes));
 
        $postLienquan = Post::all()->where('published','like','1')->where('id_category','like',$post->id_category)->take(3);

        $postMoinhat = Post::where('published','1')->orderBy('published_at','desc')->take(3)->get();
        return view('pages.chitietbaipost',['post'=>$post,'count_like'=>$count_like,'count_dislike'=>$count_dislike,'rate'=>$rate,'postLienquan'=>$postLienquan,'postMoinhat'=>$postMoinhat]);
    }
}
