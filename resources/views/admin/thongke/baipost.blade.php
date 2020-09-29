@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Thống kê Post
                <div class="form-group">
                    <h6>
                        <form action="admin/thongke/baiposttrave" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <select name="nam" id = "nam">
                            @for ($i = 2017; $i < $namhientai; $i++)
                                <option value={{$i}}>{{$i}}</option>
                            @endfor
                            <option value={{$namhientai}} selected="selected">{{$namhientai}}</option>
                        </select>
                        <button  class=".btn-thongkepost">Xem</button>
                        </form>
                    </h6>
                </div>
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
                   <tr align="center">
                       <th>Chủ Đề</th>
                       <th>Tháng 1</th>
                       <th>Tháng 2</th>
                       <th>Tháng 3</th>
                       <th>Tháng 4</th>
                       <th>Tháng 5</th>
                       <th>Tháng 6</th>
                       <th>Tháng 7</th>
                       <th>Tháng 8</th>
                       <th>Tháng 9</th>
                       <th>Tháng 10</th>
                       <th>Tháng 11</th>
                       <th>Tháng 12</th>
                       <th>Năm</th>
                       <th>Tổng</th>
                   </tr>
               </thead>
                
               {{-- @for ($j = 2020; $j <= 2022; $j++) --}}
               <tbody id="posttrave" name="posttrave">
                   @foreach ($category as $ct)
                   <?php
                        $tong = 0;
                   ?>
                        <tr class="even gradeC" align="center">
                            <td>{{$ct->title}}</td>
                            @for ($i = 1; $i <= 12; $i++)
                                <?php
                                if($i == 12){
                                    $from = date($namxet."-12-01");
                                    $to = date(($namxet+1)."-01-01");
                                    //$count1 = count($ct->posts->whereBetween('published_at', [$from, $to]));
                                    $countp = countPost($from,$to,$ct);
                                    $tong = $tong + $countp;
                                }else {
                                    $from = date($namxet."-".$i."-01");
                                    $to = date($namxet."-".($i+1)."-01");
                                    //$count1 = count($ct->posts->whereBetween('published_at', [$from, $to]));
                                    $countp = countPost($from,$to,$ct);
                                    $tong = $tong + $countp;
                                }
                            ?>
                            <td>{{$countp}}</td>
                            @endfor
                            <td>{{$namxet}}</td> 
                            <td>{{$tong}}</td>   
                        </tr>
                   @endforeach
               </tbody>
               <td>
                    Tổng
                </td>
                <?php
                    $tong2 = 0;
                ?>
               @for ($i = 1; $i <= 12; $i++)
                <?php
                    
                    if($i == 12){
                        $from = date($namxet."-12-01");
                        $to = date(($namxet+1)."-01-01");
                        //$count1 = count($ct->posts->whereBetween('published_at', [$from, $to]));
                        $countpt = countPostTong($from,$to,$ct);
                        $tong2 = $tong2 + $countpt;
                    }else {
                        $from = date($namxet."-".$i."-01");
                        $to = date($namxet."-".($i+1)."-01");
                        //$count1 = count($ct->posts->whereBetween('published_at', [$from, $to]));
                        $countpt = countPostTong($from,$to,$ct);
                        $tong2 = $tong2 + $countpt;
                    }
                ?>
                        <td>
                            {{$countpt}}
                        </td>
                    
                @endfor
                <td>
                    {{$namxet}}
                </td>
                <td>
                    {{$tong2}}
                </td>
           </table>
       </div>
       <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->  
@endsection

