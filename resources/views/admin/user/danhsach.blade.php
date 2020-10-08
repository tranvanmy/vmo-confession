@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">User
                   <small>Danh sách</small>
               </h1>
           </div>
           <!-- /.col-lg-12 -->
           @if(session()->get('success'))
               <div class="alert alert-success">
                   {{ session()->get('success') }}
               </div>
           @elseif(session()->get('loi')) 
                <div class="alert alert-danger">
                    {{ session()->get('loi') }}
                </div>    
            @endif
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Tên</th>
                       <th>Email</th>
                       <th>Chức vụ</th>
                       <th>Ngày tạo</th>
                       <th>Xóa</th>
                       <th>Sửa</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($users as $us)
                        <tr class="even gradeC" >
                            <td>{{$us->id}}</td>
                            <td>{{$us->name}}</td>
                            <td>{{$us->email}}</td>
                            <?php
                                $kt = false;
                                if(count($model_has_roles->where('model_id','=',$us->id)->where('role_id','=',1)) >= 1){
                                    $kt = true;
                                }                
                            ?>
                            @if ($kt == false)
                                <td>Thành viên</td>
                            @else
                                <td>Admin</td>
                            @endif
                            <td>{{$us->created_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$us->id}}">Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$us->id}}">Sửa</a></td>    
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

