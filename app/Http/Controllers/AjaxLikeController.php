<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\License;

class AjaxLikeController extends Controller
{
    //
    // public function getLike($idPost){
    //     return "toanto";
    //     $post = Post::find($idPost);
    //     //return count($post->likes->where('id_user','=',Auth::user()->id)->where('value','=',1));
    //     if(count($post->likes->where('id_user','=',Auth::user()->id)->where('value','=','1')) == 0){
    //         // $post->likes()->create([
    //         //     'id_user'=>Auth::user()->id,
    //         //     'value'=>1
    //         // ]);
    //         $like_create = new Like();
    //         $like_create->id_user = Auth::user()->id;
    //         $like_create->value = 1;
    //         $like_create->likeable_type = 'App\Models\Post';
    //         $like_create->likeable_id = $idPost;
    //         $like_create->save();

    //         //return "tpantp";
    //         //$count_like = count($post->likes->where('value','=','1'));
    //         $count_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Post')->get());
    //         echo"<button id='button' value=".$post->id." class='btn btn-primary'>
    //                  ".$count_like." Đã Like
    //                  </button>";
    //     }else{
    //         //return "toàn";
    //         $like_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',1)->where('likeable_type','=','App\Models\Post')->delete();
            
    //         $count_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Post')->get());
    //         //return $count_like;
    //         echo"<button id='button' value=".$post->id." class='bg-dark text-white'>
    //                  ".$count_like." Like
    //                  </button>";
    //     }

    // }

    public function getLike($idPost){
        //return "toanto";
        $post = Post::find($idPost);
        $like_create = new Like();
        $like_create->id_user = Auth::user()->id;
        $like_create->value = 1;
        $like_create->likeable_type = 'App\Models\Post';
        $like_create->likeable_id = $idPost;
        $like_create->save();

        $count_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Post')->get());
        echo "<button id='btnDaLike' name='btnDaLike' value=".$post->id." class='btn btn-primary btn-dalike'>
            ".$count_like." Đã Like
            </button>";
    }

    public function getDaLike($idPost){
        //return "toanto";
        $post = Post::find($idPost);
        $like_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',1)->where('likeable_type','=','App\Models\Post')->delete();
        $count_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Post')->get());
        echo "<button id='btnLike' name='btnLike' value=".$post->id." class='bg-dark text-white btn-like'>
            ".$count_like." Like
            </button>";
    }
}
