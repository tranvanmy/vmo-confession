@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Loại Tin
                   <small></small>
               </h1>
           </div>
           <!-- /.col-lg-12 -->
           @if(session()->get('success'))
               <div class="alert alert-success">
                   {{ session()->get('success') }}
               </div>
           @endif
           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               <thead>
                   <tr align="center">
                       <th>ID</th>
                       <th>Tên thể loại</th>
                       <th>create_at</th>
                       <th>Delete</th>
                       <th>Edit</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($categories as $ct)
                        <tr class="even gradeC" align="center">
                            <td>{{$ct->id}}</td>
                            <td>{{$ct->title}}</td>
                            <td>{{$ct->created_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/xoa/{{$ct->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/sua/{{$ct->id}}">Edit</a></td>
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

