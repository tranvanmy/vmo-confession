<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach($category as $tl)
        @if(count($category) > 0)
        <li href="#" class="list-group-item menu1">
            {{ $tl->title}}
        </li>
        

        @endif
        @endforeach



    </ul>
</div>
