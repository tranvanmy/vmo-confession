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
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;">VMO Confession</h2>
            </div>

            <h4>Vmo Confession</h4>
            <p>title: </p>
            <p>Nội Dung</p>
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
        </div>
        
    </div>
</div>
<!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
