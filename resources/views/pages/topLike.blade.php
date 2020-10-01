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
                    <h2 style="margin-top:0px; margin-bottom:0px;">Top lượt thích</h2>
                    <div class="container">
                     
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Đăng bài viết
                    </button>
 
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title textmodal" id="exampleModalLabel" style="color:blue">Đăng bài
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- Start Popup --}}
                                <form id="Mypost" name="Mypost" action="Post" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                    <div class="modal-body">

                                        <!-- Category -->
                                        {{-- <div class="mb-3"> --}}
                                        <select class="custom-select mr-sm-2" style="color:blue" id="category"
                                            name="category">

                                            <option selected value="0">Chọn Thể Loại</option>
                                            @foreach($category as $tl)
                                                <option value="{{ $tl->id }}">{{ $tl->title }}</option>
                                            @endforeach
                                        </select>

                                        {{-- </div> --}}

                                        <!-- end  -->
                                        <div class="form-group">
                                            <label class="textmodal" style="color:blue">Tiêu đề</label>
                                            <input type="text" class="form-control" id="title" name="title">

                                            <span id="titleloc"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" style="color:blue">Nội dung</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                name="content"></textarea>
                                            <span id="show-error"></span>
                                        </div>


                                    </div>
                                    <!-- ENDPOPUP -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button id="btn-save" type="submit" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif

                @foreach($posthome as $post)
                  
                    <hr>
                    <h4>Vmo Confession</h4>
                    <h5>
                    <a href="chitietbaipost/{{$post->id}}"><b>#{{ $post->id }}:</b> {{ $post->title }}</a>
                    </h5>
                    <p>{{ $post->content }}</p>
                    <!-- con -->
                    <!-- <hr>
                <p>2 like</p>
                <hr> -->
                    @include('layout.like')
                    
                @endforeach
                
                {!! $posthome->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- end Page Content -->
@endsection
