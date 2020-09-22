@extends('layout.index')

@section('content')
   <!-- Page Content -->
 <!-- Page Content -->
 <div class="container">



<div class="space20"></div>


<div class="row main-left">
    {{-- menu --}}
    @include('layout.menu')

    <div class="col-md-9">
        <div class="panel panel-default">            
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
            </div>

            <div class="well">
                <form role="form" action="" method="post" >
                    <h4>Viết title ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                    </div>
                    <h4>Viết bài đăng ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

        <div id="main">
            <div class="container">
              <h1 class="title-page"></h1>
              <div class="group-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>
          
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="panel-body">
                        @foreach ($theloai as $tl)
                        @if (count($tl->loaitin) > 0)
                            
                        <!-- item -->
                        <div class="row-item row">
                            <h3>
                                <a href="category.html">{{$tl->Ten}}</a> 
                                {{-- @foreach ($tl->loaitin as $lt) 
    
                                <small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
                            
                                @endforeach --}}
                            </h3>
    
                            <?php
                                $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                                //trong $data đang có 5 đối tượng lệnh shift() 
                                //lấy ra một đối tượng và $data chỉ còn 4 đối tượng
                                $tin1 = $data->shift(); 
                                
                            ?>
    
                            <div class="col-md-8 border-right">
                                <div class="col-md-5">
                                    <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                        <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                    </a>
                                </div>
    
                                <div class="col-md-7">
                                    <h3>{{$tin1['TieuDe']}}</h3>
                                    <p>{{$tin1['TomTat']}}</p>
                                    <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
    
                            </div>
                            
    
                            <div class="col-md-4">
    
    
                            </div>
                            
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
    
                        @endif
                        @endforeach
    
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="panel-body">
                        @foreach ($theloai as $tl)
                        @if (count($tl->loaitin) > 0)
                            
                        <!-- item -->
                        <div class="row-item row">
                            <h3>
                                <a href="category.html">{{$tl->Ten}}</a> 
                                {{-- @foreach ($tl->loaitin as $lt) 
    
                                <small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
                            
                                @endforeach --}}
                            </h3>
    
                            <?php
                                $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                                //trong $data đang có 5 đối tượng lệnh shift() 
                                //lấy ra một đối tượng và $data chỉ còn 4 đối tượng
                                $tin1 = $data->shift(); 
                                
                            ?>
    
                            <div class="col-md-8 border-right">
                                <div class="col-md-5">
                                    <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                        <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                    </a>
                                </div>
    
                                <div class="col-md-7">
                                    <h3>{{$tin1['TieuDe']}}</h3>
                                    <p>{{$tin1['TomTat']}}</p>
                                    <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
    
                            </div>
                            
    
                            <div class="col-md-4">
    
                                {{-- @foreach ($data as $item)
                                    
                                <a href="tintuc/{{$item->id}}/{{$item->TieuDeKhongDau}}.html">
                                    <h4>
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        {{$item->TieuDe}}
                                    </h4>
                                </a>
                               
                                @endforeach --}}
    
                            </div>
                            
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
    
                        @endif
                        @endforeach
    
                    </div> 
                  </div>
                  <div role="tabpanel" class="tab-pane" id="messages">This is Messages content</div>
                  <div role="tabpanel" class="tab-pane" id="settings">This is Settings content</div>
                </div>
              </div>
            </div>
          </div>
            <script src="../js/jquery-3.1.1.min.js" type=text/javascript></script>
            <script src="../js/bootstrap.min.js" type=text/javascript></script>
            <script src="../js/custom.js" type=text/javascript></script>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
