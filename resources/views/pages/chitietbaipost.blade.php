@extends('layout.index')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Page Content -->
<div class="container">
   <div class="row">

       <!-- Blog Post Content Column -->
       <div class="col-lg-9"> 

           <!-- Blog Post -->

           <!-- Title -->
           {{-- <h3>{{$post->category->title}}</h3> --}}
           <h1>{{$post->title}}</h1>

           <p class="lead">{!!$post->content!!}</p>
           @include('layout.like')
           <!-- Post Content -->
           {{-- <p class="lead">{!!$tintuc->NoiDung!!}</p> --}}
           
           <!-- Blog Comments -->

           <!-- Comments Form -->
           
           @if (count($errors) > 0)
           <div class="alert alert-danger">
               @foreach ($errors->all() as $err)
                   {{$err}}<br>
               @endforeach
           </div>
           @endif

           <div class="well">
               <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
               <form role="form" action="comment/{{$post->id}}" method="post" >
                   <input type="hidden" name="_token" value="{{csrf_token()}}" />
                   <div class="form-group">
                       <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                   </div>
                   <button type="submit" class="btn btn-primary">Gửi</button>
               </form>
           </div>

          

           <!-- Posted Comments -->

           <!-- Comment -->
           <?php $comments = $post->comments->where('id_parent','like',NULL);
           ?>

           @foreach ($comments as $cm)
        
           <?php
                $count_likeCm = count($cm->likes->where('value',1));
                $count_dislikeCm = count($cm->likes->where('value',-1));
                if(count($cm->likes->where('id_user','=',Auth::user()->id)->where('value','=','1')) >= 1){
                    $like_check = false;
                }else{
                    $like_check = true;
                }
                if(count($cm->likes->where('id_user','=',Auth::user()->id)->where('value','=','-1')) >= 1){
                    $dislike_check = false;
                }else{
                    $dislike_check = true;
                }
            ?>
           <div class="media" >
               <a class="pull-left" href="#">
                   <img class="media-object" src="image/user/user_icon_153312.png" alt="">
               </a>
               <div class="media-body">
                   <h4 class="media-heading">User
                       <small>{{$cm->created_at}}</small>
                   </h4>
                   <div class="well">
                   {{$cm->body}}
                   <h6>
                       <a id ='like{{$cm->id}}' class="likecm">
                            {{$count_likeCm}}
                            @if ($like_check == true)
                
                                <button id="btnLike" name="btnLike" value="{{$cm->id}}" class="btn-likecm">
                                    Like
                                </button>
                            
                            @else 
                            
                                <button id="btnDaLike" name="btnDaLike" value="{{$cm->id}}" class="btn-dalikecm" >
                                    <font color="0000FF">Đã Like</font>
                                </button>
                            
                            @endif 
                        </a>
                        <a id ="dislike{{$cm->id}}">
                            {{$count_dislikeCm}}
                            @if ($dislike_check == true)
            
                                <button id="btndisLike" name="btndisLike" value="{{$cm->id}}" class="btn-dislikecm">
                                    disLike
                                </button>
                            
                            @else 
                                <button id="btnDadisLike" name="btnDadisLike" value="{{$cm->id}}" class="btn-dadislikecm" >
                                    <font color="0000FF">Đã disLike</font>
                                </button>
                            
                            @endif
                        </a>
                   </h6>

                   <?php
                       $cmparent = $cm->comments;
                   ?>

                   @foreach ($cmparent as $cmchil)
                   <?php
                        $count_likeCmchil = count($cmchil->likes->where('value',1));
                        $count_dislikeCmchil = count($cmchil->likes->where('value',-1));
                        if(count($cmchil->likes->where('id_user','=',Auth::user()->id)->where('value','=','1')) >= 1){
                            $like_rep_check = false;
                        }else{
                            $like_rep_check = true;
                        }
                        if(count($cmchil->likes->where('id_user','=',Auth::user()->id)->where('value','=','-1')) >= 1){
                            $dislike_rep_check = false;
                        }else{
                            $dislike_rep_check = true;
                        }
                    ?>
                   <div class="well well-sm">
                       {{$cmchil->body}}
                       
                       <h6>
                        <a id ='like{{$cmchil->id}}'>
                            {{-- CHỖ ĐANG LÀM --}}
                            {{$count_likeCmchil}}
                             @if ($like_rep_check == true)
                            
                                 <button id="btnLikecmrep" name="btnLikecmrep" value="{{$cmchil->id}}" class="btn-likecm-rep">
                                     Like
                                 </button>
                             
                             @else 
                             
                                 <button id="btnDaLikecmrep" name="btnDaLikecmrep" value="{{$cmchil->id}}" class="btn-dalikecm-rep" >
                                    <font color="0000FF">Đã Like</font>
                                 </button>
                             
                             @endif 
                         </a>
                         <a id ="dislike{{$cmchil->id}}">
                            {{$count_dislikeCmchil}}
                             @if ($dislike_rep_check == true)
             
                                 <button id="btndisLikecmrep" name="btndisLikecmrep" value="{{$cmchil->id}}" class="btn-dislikecm-rep">
                                     disLike
                                 </button>
                             
                             @else 
                                 <button id="btnDadisLikecmrep" name="btnDadisLikecmrep" value="{{$cmchil->id}}" class="btn-dadislikecm-rep" >
                                    <font color="0000FF">Đã disLike</font>
                                 </button>
                             
                             @endif
                         </a>
                    </h6>
                        
                   </div>
                   @endforeach
                    <label>nhập bình luận...</label>
                       <form role="form" action="repcomment/{{$cm->id}}/{{$post->id}}" method="post" >
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           <div class="form-group">
                                <input type="text" class="form-control" name="repcomment">
                            </div>
                           <button type="submit" >bình luận</button>
                       </form>
                   </div>
                   
               </div>
           </div>

           @endforeach

       </div>

       <!-- Blog Sidebar Widgets Column -->
       <div class="col-md-3">

           <div class="panel panel-default">
               <div class="panel-heading"><b>Tin liên quan</b></div>
               <div class="panel-body">

                   @foreach ($postLienquan as $plq)
                       
                   <!-- item -->
                   <div class="row" style="margin-top: 10px;">
                       <div class="col-md-5">
                           <a href="">
                               <img class="img-responsive" src="image/user/user_icon_153312.png" alt="">
                           </a>
                       </div>
                       <div class="col-md-7">
                           <a href="chitietbaipost/{{$plq->id}}"><b>{!!$plq->category->title!!}</b></a>
                       </div>
                       <p style="padding-left: 5px">{!!$plq->title!!}</p>
                       <div class="break"></div>
                   </div>
                   <!-- end item -->

                   @endforeach
               </div>
           </div>

           <div class="panel panel-default">
               <div class="panel-heading"><b>Tin mới nhất</b></div>
               <div class="panel-body">

                   @foreach ($postMoinhat as $pmn)

                   <!-- item -->
                   <div class="row" style="margin-top: 10px;">
                       <div class="col-md-5">
                           <a href="">
                               <img class="img-responsive" src="image/user/user_icon_153312.png" alt="">
                           </a>
                       </div>
                       <div class="col-md-7">
                           <a href="chitietbaipost/{{$pmn->id}}"><b>{!!$pmn->category->title!!}</b></a>
                       </div>
                       <p style="padding-left: 5px">{!!$pmn->title!!}</p>
                       <div class="break"></div>
                   </div>
                   <!-- end item -->
                   @endforeach

               </div>
           </div>
           
       </div>

   </div>
   <!-- /.row -->
</div>
<!-- end Page Content -->

@endsection
