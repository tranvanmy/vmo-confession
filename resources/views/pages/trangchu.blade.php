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
                    <h2 style="margin-top:0px; margin-bottom:0px;">VMO Confession</h2>
                    <div class="container">
                     
                    </div>
                    
                   @include('layout.post')
                </div>

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
<<<<<<< HEAD

                @foreach($posthome as $post)
                  
                    <hr>
                    <h4>Vmo Confession</h4>
                    <h5>
                    <a href="chitietbaipost/{{$post->id}}"><b>#{{ $post->id }}:</b> {{ $post->title }}</a>
                    </h5>
                    <p>{!! $post->content !!}</p>
                    <!-- con -->
                    <!-- <hr>
                <p>2 like</p>
                <hr> -->
                    @include('layout.like')
                    
                @endforeach
=======
            <!-- Show Post -->
                @include('layout.showpost')
                
>>>>>>> de1fdeb... 1/10 show post by top vote, role-permission for admin pages
                
            </div>
            {!! $posthome->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- end Page Content -->
@endsection
