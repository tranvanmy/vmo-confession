<?php

namespace App\Http\Controllers;

use App\Models\Tukhoa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TuKhoaController extends Controller
{
    //
    public function getDanhSach(){
        $tukhoa = Tukhoa::all();
        return view('admin.tukhoa.danhsach',['tukhoa'=>$tukhoa]);
    }
    public function xoa($idTukKhoa){
        $tukhoa = Tukhoa::find($idTukKhoa);
        $tukhoa->delete();
        return redirect('admin/tukhoa/danhsach')->with('success','đã xóa từ khóa');
    }
    public function getSua($idTukKhoa){
        $tukhoa = Tukhoa::find($idTukKhoa);
        return view('admin.tukhoa.sua',['tukhoa'=>$tukhoa]);
    }
    public function postSua(Request $request, $idTukKhoa){
        $tukhoa = Tukhoa::find($idTukKhoa);
        $this->validate($request,[
            'title'=>'required'
        ],[
            'title.required'=>'Bạn chưa nội dung từ khóa'
        ]);
        $tukhoa->body = $request->title;
        $tukhoa->updated_at = Carbon::now();

        $tukhoa->save();
        return redirect('admin/tukhoa/sua/'.$idTukKhoa)->with('thongbao','Sửa từ khóa thành công');
    }
    public function getThem(){
        return view('admin.tukhoa.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'title'=>'required'
        ],[
            'title.required'=>'Bạn chưa nhập nội dung từ khóa'
        ]);
        $tukhoa = new TuKhoa();
        $tukhoa->body = $request->title;
        //$category->created_at = Carbon::now();
        //$category->updated_at = Carbon::now();

        $tukhoa->save();
        return redirect('admin/tukhoa/danhsach')->with('thongbao','Thêm từ khóa thành công');
    }
}
