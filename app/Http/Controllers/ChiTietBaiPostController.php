<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

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
        if(count($post->votes) != 0){
            $rate = (float)($total_point/count($post->votes));
        }
        else
        $rate = 0;
        $postLienquan = Post::all()->where('published','like','1')->where('id_category','like',$post->id_category)->take(3);
        $postMoinhat = Post::where('published','1')->orderBy('published_at','desc')->take(3)->get();
        //return Auth::user()->id;
        //return count($post->likes->where('id_user','=',Auth::user()->id)->where('value','=','1'));
        //if(Auth::user()->likes->where('value',1)->where('likeable_type','App\Models\Post')->where('likeable_id', $id) == NULL){
        if(count($post->likes->where('id_user','=',Auth::user()->id)->where('value','=','1')) >= 1){
           
            $like = false;
        }else{
            $like = true;
        }
        return view('pages.chitietbaipost',['post'=>$post,'count_like'=>$count_like,'count_dislike'=>$count_dislike,'rate'=>$rate,'postLienquan'=>$postLienquan,'postMoinhat'=>$postMoinhat,'like'=>$like]);
    }

    public function postComment($idPost,Request $request){
        $this->validate($request,
       [
           'NoiDung'=>'required'
        ], 
       [
            'NoiDung.required'=>'Bạn phải nhập nội dung'
       ]);

       //$tintuc = TinTuc::find($idTinTuc);

       $comment = new Comment();
       $comment->id_post = $idPost;
       $comment->body = $request->NoiDung;
       $comment->save();

        //return redirect("tintuc/$idTinTuc/".$tintuc->TieuDeKhongDau.".html");
        return redirect("chitietbaipost/".$idPost);
    }

    public function postRepComment(Request $request, $idComment, $idPost){
        $this->validate($request,
       [
           'repcomment'=>'required'
        ], 
       [
            'repcomment.required'=>'Bạn phải nhập nội dung'
       ]);

       //$tintuc = TinTuc::find($idTinTuc);

       $comment = new Comment();
       $comment->id_post = $idPost;
       $comment->body = $request->repcomment;
       $comment->id_parent = $idComment;
       $comment->save();

        //return redirect("tintuc/$idTinTuc/".$tintuc->TieuDeKhongDau.".html");
        return redirect("chitietbaipost/".$idPost);
    }
}
