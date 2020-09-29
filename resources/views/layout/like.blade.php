<table class="table table-striped table-bordered table-hover">
    <tr align="center">
        {{-- <input type="hidden" name="idPost" id="idPost" value={{$post->id}}> --}}
        <th id="like{{$post->id}}">

            @if (likePost($post->id) == true )

            <button id="btnLike" name="btnLike" value="{{$post->id}}" class="bg-dark text-white btn-like">
                {{-- <p id="like" name="like"> --}}
                <?php echo countLike($post->id)?> Like
            </button>

            @else

            <button id="btnDaLike" name="btnDaLike" value="{{$post->id}}" class="btn btn-primary btn-dalike">
                {{-- <p id="like" name="like"> --}}
                <?php echo countLike($post->id) ?> Đã Like
            </button>

            @endif

        </th>
        <th id="dislike{{$post->id}}">

            @if (disLikePost($post->id) == true)

            <button id="btndisLike" name="btndisLike" value="{{$post->id}}" class="bg-dark text-white btn-dislike">
                {{-- <p id="like" name="like"> --}}
                <?php echo countDisLike($post->id) ?> disLike
            </button>

            @else

            <button id="btnDadisLike" name="btnDadisLike" value="{{$post->id}}" class="btn btn-primary btn-dadislike">
                {{-- <p id="like" name="like"> --}}
                <?php echo countDisLike($post->id) ?> Đã disLike
            </button>

            @endif

        </th>
        <th>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            
                {{number_format(rating($post->id) ,2)}} Rate
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="rating" method="POST">
                            <input type="hidden" name="_token" value="csrf_token()">
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    
                                    <h5 >Click to rate:</h5>
                                    
                                    <div class='starrr' id='star1'></div>
                                    <div>&nbsp;
                                        <span class='your-choice-was' style='display: none;' >
                                            Your rating was <span class='choice'></span>.
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </th>

    </tr>
</table>
