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
                    @foreach($post as $pt)
                    <h4>Vmo Confession</h4>
                    <p><b>#{{ $pt->id }}: {!! changecolor($pt->title,$keyword) !!}</b></p>
                    <p>{!! changecolor($pt->content,$keyword) !!}</p>
                    <!-- con -->
                    <button type="button" class="btn btn-primary" id="like">
                        <span class="badge badge-light">Like</span>
                        <span class="sr-only">unread messages</span>
                    </button>
                    <button type="button" class="btn btn-primary" id="like">
                        <span class="badge badge-light">Dislike</span>
                        <span class="sr-only">unread messages</span>
                    </button>
                    <button type="button" class="btn btn-primary" id="like">
                        <span class="badge badge-light">Comment</span>
                        <span class="sr-only">unread messages</span>
                    </button>
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
