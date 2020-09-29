<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

        $count_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Post')->where('likeable_id','=',$idPost)->get());
        echo "".$count_like."<button id='btnDaLike' name='btnDaLike' value=".$post->id." class='btn btn-primary btn-dalike'>
             Đã Like
            </button>";
    }

    public function getDaLike($idPost){
        //return "toanto";
        //$post = Post::find($idPost);
        $like_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',1)->where('likeable_type','=','App\Models\Post')->where('likeable_id','=',$idPost)->delete();
        $count_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Post')->where('likeable_id','=',$idPost)->get());
        echo "".$count_like."<button id='btnLike' name='btnLike' value=".$idPost." class='bg-dark text-white btn-like'>
             Like
            </button>";
    }

    public function getdisLike($idPost){
        $post = Post::find($idPost);
        
        $dislike_create = new Like();
        $dislike_create->id_user = Auth::user()->id;
        $dislike_create->value = -1;
        $dislike_create->likeable_type = 'App\Models\Post';
        $dislike_create->likeable_id = $idPost;
        $dislike_create->save();

        $count_dislike = count(Like::where('value','=',-1)->where('likeable_type','=','App\Models\Post')->where('likeable_id','=',$idPost)->get());
        //return $count_dislike;
        echo "".$count_dislike."<button id='btnDadisLike' name='btnDadisLike' value=".$post->id." class='btn btn-primary btn-dadislike'>
             Đã disLike
            </button>";
    }

    public function getDadisLike($idPost){
        $post = Post::find($idPost);
        $dislike_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',-1)->where('likeable_type','=','App\Models\Post')->where('likeable_id','=',$idPost)->delete();
        $count_dislike = count(Like::where('value','=',-1)->where('likeable_type','=','App\Models\Post')->where('likeable_id','=',$idPost)->get());
        echo "".$count_dislike."<button id='btndisLike' name='btndisLike' value=".$post->id." class='bg-dark text-white btn-dislike'>
             disLike
            </button>";
    }

    //like Comment

    public function getLikeComment($idComment){
        //$comment = Comment::find($idComment);

        $like_comment_create = new Like();
        $like_comment_create->id_user = Auth::user()->id;
        $like_comment_create->value = 1;
        $like_comment_create->likeable_type = 'App\Models\Comment';
        $like_comment_create->likeable_id = $idComment;
        $like_comment_create->save();

        $count_comment_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());
        //return $count_dislike;
        echo "".$count_comment_like."<button id='btnDaLike' name='btnDaLike' value=".$idComment." class='btn-dalikecm' >
        <font color='0000FF'>Đã Like</font>
        </button>";
    }

    public function getDaLikeComment($idComment){
        $dislike_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->delete();
        $count_comment_dislike = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());
        echo "".$count_comment_dislike."<button id='btnLike' name='btnLike' value=".$idComment." class='btn-likecm'>
        Like
        </button>";
    }

    public function getdisLikeComment($idComment){
        $dislike_create = new Like();
        $dislike_create->id_user = Auth::user()->id;
        $dislike_create->value = -1;
        $dislike_create->likeable_type = 'App\Models\Comment';
        $dislike_create->likeable_id = $idComment;
        $dislike_create->save();

        $count_dislikecm = count(Like::where('value','=',-1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());

        echo "".$count_dislikecm."<button id='btnDadisLike' name='btnDadisLike' value=".$idComment." class='btn-dadislikecm' >
        <font color='0000FF'>Đã disLike</font>
        </button>";
    }

    public function  getDadisLikeComment($idComment){
        //$post = Post::find($idPost);
        $dislike_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',-1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->delete();
        $count_dislikecm = count(Like::where('value','=',-1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());
        echo "".$count_dislikecm."<button id='btndisLike' name='btndisLike' value=".$idComment." class='btn-dislikecm'>
             disLike
            </button>";
    }

    //rep Comment

    public function getLikeCommentRep($idComment){
        //$comment = Comment::find($idComment);

        $like_comment_create = new Like();
        $like_comment_create->id_user = Auth::user()->id;
        $like_comment_create->value = 1;
        $like_comment_create->likeable_type = 'App\Models\Comment';
        $like_comment_create->likeable_id = $idComment;
        $like_comment_create->save();

        $count_comment_like = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());
        //return $count_dislike;
        echo "".$count_comment_like."<button id='btnDaLike' name='btnDaLike' value=".$idComment." class='btn-dalikecm-rep' >
        <font color='0000FF'>Đã Like</font>
        </button>";
    }

    public function getDaLikeCommentRep($idComment){
        $dislike_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->delete();
        $count_comment_dislike = count(Like::where('value','=',1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());
        echo "".$count_comment_dislike."<button id='btnLike' name='btnLike' value=".$idComment." class='btn-likecm-rep'>
        Like
        </button>";
    }

    public function getdisLikeCommentRep($idComment){
        $dislike_create = new Like();
        $dislike_create->id_user = Auth::user()->id;
        $dislike_create->value = -1;
        $dislike_create->likeable_type = 'App\Models\Comment';
        $dislike_create->likeable_id = $idComment;
        $dislike_create->save();

        $count_dislikecm = count(Like::where('value','=',-1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());

        echo "".$count_dislikecm."<button id='btnDadisLike' name='btnDadisLike' value=".$idComment." class='btn-dadislikecm-rep' >
        <font color='0000FF'>Đã disLike</font>
        </button>";
    }

    public function getDadisLikeCommentRep($idComment){
        //$post = Post::find($idPost);
        $dislike_delete = Like::where('id_user','=',Auth::user()->id)->where('value','=',-1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->delete();
        $count_dislikecm = count(Like::where('value','=',-1)->where('likeable_type','=','App\Models\Comment')->where('likeable_id','=',$idComment)->get());
        echo "".$count_dislikecm."<button id='btndisLike' name='btndisLike' value=".$idComment." class='btn-dislikecm-rep'>
             disLike
            </button>";
    }
}
