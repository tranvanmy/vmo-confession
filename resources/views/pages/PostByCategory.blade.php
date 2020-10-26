@extends('layout.index')

@section('content')

<!-- Page Content -->
<!-- Page Content -->
<div class="container">



    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Thể Loại: {{$categoryPost->title}}</h2>
                </div>

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                @include('layout.post')
                @foreach($post as $post)
                    <hr>
                    <h4>Vmo Confession</h4>
                    <a href="chitietbaipost/{{$post->id}}"><b>#{{ $post->id }}:</b> {{ $post->title }}</a>
                    <p>{!! $post->content !!}</p>
                    <!-- con -->
                    <!-- <hr>
                <p>2 like</p>
                <hr> -->
                    
                    
                @include('layout.like')
                <hr>
                @endforeach

            </div>

        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
