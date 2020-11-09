

<table class="table table-striped table-bordered table-hover">
    <tr align="center">
        {{-- <input type="hidden" name="idPost" id="idPost" value={{$post->id }}>
        --}}
        <th id="likep{{ $post->id }}">

            @if(likePost($post->id) == true )
            <?php echo countLike($post->id)?>
            <button id="btnLike" name="btnLike" value="{{ $post->id }}" class="btn btn-default btn-like"
            {{-- <button id="btnLike" name="btnLike" value="{{ $post->id }}"  class="btn btn-default glyphicon glyphicon-hand-up" --}}
                >
                {{-- <p id="like" name="like"> --}}
                 Like
            </button>

            @else
            <?php echo countLike($post->id) ?> 
            <button id="btnDaLike" name="btnDaLike" value="{{ $post->id }}" class="btn btn-primary btn-dalike">
                {{-- <p id="like" name="like"> --}}
                Đã Like
            </button>

            @endif

        </th>
        <th id="dislikep{{ $post->id }}">

            @if(disLikePost($post->id) == true)
            <?php echo countDisLike($post->id) ?>
            <button id="btndisLike" name="btndisLike" value="{{ $post->id }}" class="btn btn-default btn-dislike">
                {{-- <p id="like" name="like"> --}}
                 disLike
            </button>

            @else
            <?php echo countDisLike($post->id) ?>
            <button id="btnDadisLike" name="btnDadisLike" value="{{ $post->id }}" class="btn btn-primary btn-dadislike">
                {{-- <p id="like" name="like"> --}}
                 Đã disLike
            </button>

            @endif

        </th>
        
        <th>
            <a href="chitietbaipost/{{$post->id}}"><button type="button" class="btn btn-primary btn-comment">
                Bình luận (<?php echo countComment($post->id) ?>)</button>
            </a>
        </th>
        <!-- //  VOTE  -->
        <th>
            @if(checkVote($post->id) == true)
                <!-- Button trigger modal -->
                <span id="vt{{$post->id}}">  
                    {{number_format(vote($post->id) ,2)}}/ 5
                </span>  
                <button  type="button" class="btn btn-primary" data-toggle="modal" id="btn-{{$post->id}}"
                    data-target="#exampleModal{{ $post->id }}" >
                 Đánh giá  (<span id="resultVote{{$post->id}}"><?php echo countVote($post->id) ?></span>)
                </button>
            @else 
            
                <!-- Button trigger modal -->
                <span id="vt{{$post->id}}">  
                    {{number_format(vote($post->id) ,2)}}/ 5
                </span>  
                <button  type="button" class="btn btn-primary btnhover" data-toggle="modal" id="btn-{{$post->id}}"
                       
                    data-target="#exampleModal{{ $post->id }}" >
                 Đánh giá  (<span id="resultVote{{$post->id}}"><?php echo countVote($post->id) ?></span>)
                </button>
            @endif
                
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <label class="modal-title" id="exampleModalLabel">Đánh giá : {{ $post->title }}</label>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="main">
                            <form action="" method="post" id="myForm{{$post->id}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @csrf
                               
                                <div class="modal-body" >
                                        {{-- <select name="point" id="point{{$post->id}}">
                                            <option value="1">{{ 1 }}</option>
                                            <option value="2">{{ 2 }}</option>
                                            <option value="3">{{ 3 }}</option>
                                            <option value="4">{{ 4 }}</option>
                                            <option value="5">{{ 5 }}</option>
                                        </select> --}}
                                            
                                        <span class="rating-star" name="point" id="point{{$post->id}}">
                                            <input type="radio" name="point" value="5"><span class="star"></span>
        
                                            <input type="radio" name="point" value="4"><span class="star"></span>
                                        
                                            <input type="radio" name="point" value="3"><span class="star"></span>
                                        
                                            <input type="radio" name="point" value="2"><span class="star"></span>
                                        
                                            <input type="radio" name="point" value="1"><span class="star"></span>
                                            </span>
                                            {{-- <p>Cảm ơn vì đánh giá của bạn</p> --}}
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button   type="submit" value="{{$post->id}}" 
                                        class="btn btn-primary btn-vote" 
                                        >Gửi</button>
                                </div>
                            </form>
                        </div>

                            {{-- thử nghiệm --}}
                            {{-- <div class="main">
                                <form action="" method="post" id="myForm{{$post->id}}">
                                <span class="rating-star" name="point" id="point{{$post->id}}">
                                    <input type="radio" name="rating" value="5"><span class="star"></span>

                                    <input type="radio" name="rating" value="4"><span class="star"></span>
                                
                                    <input type="radio" name="rating" value="3"><span class="star"></span>
                                
                                    <input type="radio" name="rating" value="2"><span class="star"></span>
                                
                                    <input type="radio" name="rating" value="1"><span class="star"></span>
                                </span>
                                <p>Thanks For Giving <span id="selected-rating" class="selected-rating" >0</span> Stars.</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button   type="submit" value="{{$post->id}}" 
                                        class="btn btn-primary btn-vote" 
                                        >Gửi</button>
                                </div>
                                </form>
                            </div> --}}
                            {{-- đến đây --}}
                    </div>
                </div>
            </div>


        </th>

    </tr>
</table>
