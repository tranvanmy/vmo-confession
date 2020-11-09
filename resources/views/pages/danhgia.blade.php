@extends('layout.index')
@section('content')
<div class="container">



    <div class="space20"></div>


    <div class="row main-left">
        {{-- @include('layout.menu') --}}

        {{-- <div class="col-md-9"> --}}
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
            @if (count($cauhois) == 0)
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Không có câu hỏi cần đánh giá</h2>
                  </div>
                </div>
            @else
            <form action="diemcauhoi" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="panel panel-default">
                  <div class="panel-heading" style="background-color:#337AB7; color:white;">
                      <h2 style="margin-top:0px; margin-bottom:0px;">Bảng đánh giá</h2>
  
                  </div>
                  <?php
                    $sl = 0;
                  ?>
                  @foreach ($cauhois as $ch)
                  <?php
                    $sl++;
                  ?>
                  <div>
                      <div class="container">
                          <h2>{{$ch->content}}</h2>
                          <p>The form below contains three radio buttons. The last option is disabled:</p>
                          {{-- <form action="diemcauhoi" method="POST"> --}}
                            <div class="radio">
                              <label><input type="radio" value={{1}} id="danhgia{{$sl}}" name="danhgia{{$sl}}">1.Hoàn toàn không hài lòng</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" value={{2}} id="danhgia{{$sl}}" name="danhgia{{$sl}}">2.Không hài lòng một số mặt</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" value={{3}} id="danhgia{{$sl}}" name="danhgia{{$sl}}">3.Bình thường</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" value={{4}} id="danhgia{{$sl}}" name="danhgia{{$sl}}">4.Hài lòng</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" value={{5}} id="danhgia{{$sl}}" name="danhgia{{$sl}}">5.Rất hài lòng</label>
                            </div>
                          {{-- </form> --}}
                        </div>
                  </div>
                  @endforeach
              </div>
              <div>
                  <div class="container">
                      <button type="submit" class="btn btn-primary" disabled id="btnDanhGia" value={{$sl}}>Gửi</button>
                      {{-- <a onclick="deletePost" class="btn btn-primary">Gửi</a> --}}
                  </div>
              </div>
            </form>
            @endif
            
        {{-- </div> --}}
    </div>
    <!-- /.row -->
</div>
@endsection
@section('scriptnd')
<script>
    $(document).ready(function(){
      var sl = $("#btnDanhGia").val();
      for( var u = 1; u <= sl; u++){
        $(document).on('click', "#danhgia"+u, function(){
            console.log('đây là đánh giá');
            
            var kt = 0;
            var arrayDiem = "";
            for( var j = 1; j <= sl ; j++){
            var off_payment_method = document.getElementsByName('danhgia'+j);
              // var ischecked_method = false;
              for ( var i = 0; i < off_payment_method.length; i++) {
                  if(off_payment_method[i].checked) {
                      arrayDiem = arrayDiem + off_payment_method[i].value;
                      // console.log(arrayDiem[kt]);
                      kt++;
                  }
              }
            }
            if(kt == sl) {
              // $.get('diemcauhoi/' + arrayDiem);
              // alert("đã đủ");
              console.log(kt);
              console.log(sl);
              $('#btnDanhGia').prop('disabled', false);
            }
            if(kt < sl) {
              // alert("bạn phải tích đủ các câu hỏi");
              console.log(kt);
              console.log(sl);
              // console.log("toan");
              $('#btnDanhGia').prop('disabled', true);
            }
        });
      }
    });
</script>
@endsection

