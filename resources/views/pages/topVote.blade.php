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
                    <h2 style="margin-top:0px; margin-bottom:0px;">Top Đánh Giá</h2>
                    <div class="container">
                     
                    </div>
                 
                </div>

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif

                @include('layout.showpost')
                       
                
            </div>
            {!! $posthome->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- end Page Content -->
@endsection
