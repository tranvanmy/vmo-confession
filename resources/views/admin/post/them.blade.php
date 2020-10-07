@extends('admin.layout.index')

@section('content')
    
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài đăng
                    <small>thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            
                <form action="admin/post/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="category" id="category">
                            @foreach ($categories as $ct)
                                <option value="{{$ct->id}}">{{$ct->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title" id="title" placeholder="nhập tiêu đề cho bài post" />
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" name="content" id="content" rows = "3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" id="published" name="published" >
                            <option value="{{0}}">Chờ duyệt</option>
                            <option value="{{1}}">Duyệt luôn</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Ngày Duyệt : </label>
                        <input type="date" name="published_at" id="published_at" name="bday" disabled="">
                    </div>
                        
                    <button type="submit" class="btn btn-default">Thêm</button> 
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
