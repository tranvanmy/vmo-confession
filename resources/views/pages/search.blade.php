@extends('layout.index')

@section('content')
<!-- Page Content -->
<!-- Page Content -->
<div class="container">



    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')

        <?php
            function changecolor($str, $tukhoa){

                return str_replace($tukhoa, "<span style='color:red';>$tukhoa</span>",$str);
            }
        ?>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Kết quả: {{$keyword}}</h2>
                </div>
                @if(count($post) == 0)
                    <h4> Không có kết quả</h4> 
                @else 
                    @foreach($post as $post)
                    <h4>Vmo Confession</h4>
                    <p><b>#{{ $post->id }}: {!! changecolor($post->title,$keyword) !!}</b></p>
                    <p>{!! changecolor($post->content,$keyword) !!}</p>
                    <!-- con -->
                    @include('layout.like')
                    <hr>
                @endforeach
                @endif
                

            </div>

        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
