@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Câu hỏi
                   <small>Danh sách</small>
               </h1>
           </div>
           <div >
            <a href="" id="reset" onclick="functionReset()" style="margin-bottom: 5px" class="btn btn-danger btn-lg">Reset</a>
            <a href="" id="dung" onclick="functionDung()" style="margin-bottom: 5px; margin-left: 5px" class="btn btn-danger btn-lg">Dừng</a>
            </div>
           <!-- /.col-lg-12 -->
           @if(session()->get('success'))
               <div class="alert alert-success">
                   {{ session()->get('success') }}
               </div>
           @endif
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr >
                       <th>ID</th>
                       <th>Nội dung câu hỏi</th>
                       <th>Tổng điểm</th>
                       <th>Lượt đánh giá</th>
                       <th>Trung bình / 5</th>
                       <th>Trạng thái</th>
                       <th>Xóa</th>
                       <th>Sửa</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($cauhois as $ch)
                        <tr class="even gradeC">
                            <td>{{$ch->id}}</td>
                            <td>{{$ch->content}}</td>
                            <td>{{$ch->diem}}</td>
                            <td>{{$ch->luot_danh_gia}}</td>
                            @if ($ch->diem != 0 && $ch->luot_danh_gia != 0)
                                <td>{{number_format(($ch->diem/$ch->luot_danh_gia) ,2)}}/ 5</td>
                            @else
                                <td>null</td>
                            @endif
                            @if ($ch->trangthai == 0)
                                <td>Không k/s</td>
                            @else
                                <td>Khảo sát</td>
                            @endif
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cauhoi/xoa/{{$ch->id}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cauhoi/sua/{{$ch->id}}">Sửa</a></td>
                        </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
       <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->  
@endsection
@section('script')
    <script>
        function functionReset() {
            // var txt;
            if (confirm("Bạn có chắc chắn muốn reset điểm và lượt đánh giá?")) {
                // document.location.href = "admin/cauhoi/reset";
                $('a#reset').attr('href',"admin/cauhoi/reset");
            } else {
                $('a#reset').attr('href',"admin/cauhoi/danhsach");
            }
            // document.getElementById("demo").innerHTML = txt;
        }
        function functionDung(){
            if (confirm("Bạn có chắc chắn muốn dừng đánh giá?")) {
                $('a#dung').attr('href',"admin/cauhoi/dung");
            } else {
                $('a#dung').attr('href',"admin/cauhoi/danhsach");
            }
        }
    </script>
@endsection

