<table class="table table-striped table-bordered table-hover">
    <tr align="center">
        {{-- <input type="hidden" name="idPost" id="idPost" value={{$post->id }}>
        --}}
        <th id="like{{ $post->id }}">

            @if(likePost($post->id) == true )
            <?php echo countLike($post->id)?>
            <button id="btnLike" name="btnLike" value="{{ $post->id }}" class="bg-dark text-white btn-like">
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
        <th id="dislike{{ $post->id }}">

            @if(disLikePost($post->id) == true)
            <?php echo countDisLike($post->id) ?>
            <button id="btndisLike" name="btndisLike" value="{{ $post->id }}" class="bg-dark text-white btn-dislike">
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
                 Đánh giá  (<?php echo countVote($post->id) ?>)
                </button>
            @else 
            
                <!-- Button trigger modal -->
                <span id="vt{{$post->id}}">  
                    {{number_format(vote($post->id) ,2)}}/ 5
                </span>  
                <button  type="button" class="btn btn-primary btn-vote" data-toggle="modal" id="btn-{{$post->id}}"
                    style="background-color:white;
	                color:black"    
                    data-target="#exampleModal{{ $post->id }}" >
                 Đánh giá  (<?php echo countVote($post->id) ?>)
                </button>
            @endif
                
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                            <form action="" method="post" id="myForm{{$post->id}}">
                                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                                @csrf
                                <div class="modal-body">
                                    <div class="container">

                                        <label>Đánh giá: </label>
                                        <select name="point" id="point{{$post->id}}">

                                            <option value="1">{{ 1 }}</option>
                                            <option value="2">{{ 2 }}</option>
                                            <option value="3">{{ 3 }}</option>
                                            <option value="4">{{ 4 }}</option>
                                            <option value="5">{{ 5 }}</option>

                                        </select>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button   type="submit" value="{{$post->id}}" 
                                        class="btn btn-primary btn-vote" 
                                        >Gửi</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>


        </th>

    </tr>
</table>
