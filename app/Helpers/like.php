<?php 
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (!function_exists('likePost')) {
    function likePost($id)
    {
        $post = Post::find($id);
            
            if(count($post->likes->where('id_user','=',Auth::user()->id)->where('value','=','1')) >= 1)
            {
           
                return false;
            }else{
                return true;
            }
    }
}
  if (!function_exists('disLikePost')) {
    function disLikePost($id)
    {
        $post = Post::find($id);
            
        if(count($post->likes->where('id_user','=',Auth::user()->id)->where('value','=','-1')) >= 1){
            return  false;
        }else{
            return true;
        }
    }
  }
  if (!function_exists('countLike')) {
    function countLike($id)
    {
        $post = Post::find($id);
            
        return count($post->likes->where('value','=','1'));
    }
  }
  if (!function_exists('countDisLike')) {
    function countDisLike($id)
    {
        $post = Post::find($id);
            
        return count($post->likes->where('value','=','-1'));

    }
}
    if (!function_exists('rating')) {
        function vote($id)
        {
            $post = Post::find($id);
                
            $total_point = 0;
            foreach($post->votes as $vote){
                $total_point = $total_point + $vote->point;
            }
            if(count($post->votes) != 0){
                $rate = (float)($total_point/count($post->votes));
            }
            else
            $rate = 0;
            return $rate;
        
        }
  }

    if (!function_exists('countPost')) {
        function countPost($from,$to,$ct)
        {
            //$count = count(Post::where('published_at','>=',$from)->where('published_at','<',$to)->where('id_category','=',$ct->id)->get());
            $count = count($ct->posts()->whereBetween('published_at', [$from, $to])->get());
            return $count;
        }
    }

    if (!function_exists('countPostTong')) {
        function countPostTong($from,$to,$ct)
        {
            //$count = count(Post::where('published_at','>=',$from)->where('published_at','<',$to)->where('id_category','=',$ct->id)->get());
            $count = count(Post::whereBetween('published_at', [$from, $to])->get());
            return $count;
        }
    }
  if (!function_exists('checkVote')) {
    function checkVote($id)
    {
        $post = Post::find($id);
            
        if(count($post->votes()->where('id_user',Auth::user()->id)->get())==0){
            return false;
        }else return true;
        
    }
    if (!function_exists('countComment')) {
        function countComment($id)
        {
            $post = Post::find($id);
            return count($post->comments()->get());
        }
    }
    if (!function_exists('countVote')) {
        function countVote($id)
        {
            $post = Post::find($id);
            return count($post->votes()->get());
        }
    }
    if (!function_exists('getComments')) {
        function getComments($id)
        {
            $post = Post::find($id);
            $comments = $post->comments->where('id_parent','like',NULL);
            return $comments;
        }
    }
    //hiện tên ng comment
    if (!function_exists('getTenCmt')) {
        function getTenCmt($id)
        {
            $user = User::find($id);
            $ten_user = $user->name;
            return $ten_user;
        }
    }
    //xóa dấu chữ tiếng việt
    if (!function_exists('vn_str_filter')) {
        function vn_str_filter($str)
        {
            $unicode = array(
 
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
      
                'd'=>'đ',
      
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
      
                'i'=>'í|ì|ỉ|ĩ|ị',
      
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
      
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
      
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
      
                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
      
                'D'=>'Đ',
      
                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
      
                'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
      
                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
      
                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
      
                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
      
            );
      
           foreach($unicode as $nonUnicode=>$uni){
      
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
      
           }
      
            return $str;
        }
    }
}


?>
