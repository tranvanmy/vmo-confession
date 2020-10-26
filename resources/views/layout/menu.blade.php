<div class="col-md-3 ">
    <ul class="list-group" id="menu" style="cursor:pointer">
        <li href="homepage" class="list-group-item menu1 active" style="cursor:auto">
            Thể Loại
        </li>
        
        @foreach($category as $tl)
            <li href="#" class="list-group-item menu1">
                <a href="PostbyCategory/{{$tl->id}}">{{ $tl->title}}</a>
            </li>
        @endforeach

        {{-- <li href="#" class="list-group-item menu1">
            Thể Loại
        </li>
        <ul>
            @foreach($category as $tl)
            <li class="list-group-item">
                <a href="PostbyCategory/{{$tl->id}}">{{ $tl->title}}</a>
            </li>
            @endforeach
        </ul>
        <li href="#" class="list-group-item menu1">
            Sắp xếp theo
        </li>
        <ul>
            <li class="list-group-item">
                <a href="toplike">Top lượt thích</a>
            </li>
            <li class="list-group-item">
                <a href="topcomment">Top Comment</a>
            </li>
            <li class="list-group-item">
                <a href="topvote">Top Đánh Giá</a>
            </li>

        </ul> --}}



    </ul>
</div>
