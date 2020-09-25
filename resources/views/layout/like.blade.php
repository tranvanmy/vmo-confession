<table class="table table-striped table-bordered table-hover">
    <tr align="center">
        {{-- <input type="hidden" name="idPost" id="idPost" value={{$post->id}}> --}}
        <th id="like">
            
            @if ($like == true)
                {{$count_like}}
                <button id="btnLike" name="btnLike" value="{{$post->id}}" class="bg-dark text-white btn-like">
                {{-- <p id="like" name="like"> --}}
                     Like
                </button>
              
            @else 
                {{$count_like}}
                <button id="btnDaLike" name="btnDaLike" value="{{$post->id}}" class="btn btn-primary btn-dalike" >
                    {{-- <p id="like" name="like"> --}}
                     Đã Like
                </button>
             
            @endif 
            
        </th>
        <th id="dislike">
            
         @if ($dislike == true)
            {{$count_dislike}} 
             <button id="btndisLike" name="btndisLike" value="{{$post->id}}" class="bg-dark text-white btn-dislike">
             {{-- <p id="like" name="like"> --}}
                disLike
             </button>
           
         @else 
            {{$count_dislike}}
             <button id="btnDadisLike" name="btnDadisLike" value="{{$post->id}}" class="btn btn-primary btn-dadislike" >
                 {{-- <p id="like" name="like"> --}}
                  Đã disLike
             </button>
          
         @endif 
         
     </th>
        <th>
            {{number_format($rate ,2)}}
            <a href="">rate   </a>
            <select name="theloai" id = "theloai">

                <option value="1">{{1}}</option>
                <option value="2">{{2}}</option>
                <option value="3">{{3}}</option>
                <option value="4">{{4}}</option>
                <option value="5">{{5}}</option>
                
            </select>
        </th>
        
    </tr>
</table>