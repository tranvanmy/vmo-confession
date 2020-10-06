@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Bài đăng 
                   <small>đã duyệt</small>
               </h1>
           </div>
           <!-- /.col-lg-12 -->
           @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif

           
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr>
                       <th>Thể loại</th>
                       <th>Tiêu đề</th>
                       <th>Nội dung</th>
                       <th>Ngày duyệt</th>
                       <th>Xóa</th>
                       {{-- <th>Published</th> --}}
                   </tr>
               </thead>
               <tbody>
                   @foreach ($posts as $pt)
                        <tr class="even gradeC">
                            <td>{{$pt->category->title}}</td>
                            <td>{{$pt->title}}</td>
                            <td>{!!$pt->content!!}</td>
                            <td>{{$pt->published_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/post/xoa/{{'danhsachdaduyet'}}/{{$pt->id}}"> Xóa</a></td>
                            {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/published/{{}}">Published</a></td> --}}
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

