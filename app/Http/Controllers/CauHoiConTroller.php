<?php

namespace App\Http\Controllers;

use App\Models\CauHoi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CauHoiConTroller extends Controller
{
     //
     public function getDanhSach(){
        $cauhois = CauHoi::all();
        return view('admin.cauhoi.danhsach',['cauhois'=>$cauhois]);
    }
    public function xoa($idCauHoi){
        $cauhoi = CauHoi::find($idCauHoi);
        $cauhoi->delete();
        return redirect('admin/cauhoi/danhsach')->with('success','đã xóa câu hỏi');
    }
    public function getSua($idCauHoi){
        $cauhoi = CauHoi::find($idCauHoi);
        return view('admin.cauhoi.sua',['cauhoi'=>$cauhoi]);
    }
    public function postSua(Request $request, $idCauHoi){
        $cauhoi = CauHoi::find($idCauHoi);
        $this->validate($request,[
            'content'=>'required'
        ],[
            'content.required'=>'Bạn chưa nội dung câu hỏi'
        ]);
        $cauhoi->content = $request->content;
        $cauhoi->updated_at = Carbon::now();
        $cauhoi->trangthai = $request->trangthai;
        $cauhoi->save();
        return redirect('admin/cauhoi/danhsach/')->with('thongbao','Sửa câu hỏi thành công');
    }
    public function getThem(){
        return view('admin.cauhoi.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'content'=>'required'
        ],[
            'content.required'=>'Bạn chưa nhập nội dung câu hỏi'
        ]);
        $cauhoi = new CauHoi();
        $cauhoi->content = $request->content;
        $cauhoi->diem = 0;
        $cauhoi->luot_danh_gia = 0;
        //$category->updated_at = Carbon::now();

        $cauhoi->save();
        return redirect('admin/cauhoi/danhsach')->with('thongbao','Thêm câu hỏi thành công');
    }
    public function getReset(){
        $cauhois = CauHoi::all();
        foreach($cauhois as $cauhoi){
            $cauhoi->diem = 0;
            $cauhoi->luot_danh_gia = 0;
            $cauhoi->save();
        }
        return view('admin.cauhoi.danhsach',['cauhois'=>$cauhois]);
    }

    public function getDung(){
        $cauhois = CauHoi::all();
        foreach($cauhois as $cauhoi){
            $cauhoi->trangthai = 0;
            $cauhoi->save();
        }
        return view('admin.cauhoi.danhsach',['cauhois'=>$cauhois]);
    }
}
