<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="homepage" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach($category as $tl)
        @if(count($category) > 0)
        <li href="#" class="list-group-item menu1">
            <a href="PostbyCategory/{{$tl->id}}">{{ $tl->title}}</a>
        </li>
    
        @endif
        @endforeach



    </ul>
</div>
