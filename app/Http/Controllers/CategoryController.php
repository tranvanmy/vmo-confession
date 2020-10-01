<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Prophecy\Call\Call;

class CategoryController extends Controller
{
    //
    public function getDanhSach(){
        $categories = Category::all();
        return view('admin.category.danhsach',['categories'=>$categories]);
    }

    public function getXoa($idCategory){
        $category = Category::find($idCategory);
        $category->delete();
        return redirect('admin/category/danhsach')->with('success','đã xóa chủ đề');
    }

    public function getSua($idCategory){
        $category = Category::find($idCategory);
        return view('admin.category.sua',['category'=>$category]);
    }

    public function postSua(Request $request, $idCategory){
        $category = Category::find($idCategory);
        $this->validate($request,[
            'title'=>'required'
        ],[
            'title.required'=>'Bạn chưa nhập tên chủ đề'
        ]);
        $category->title = $request->title;
        $category->updated_at = Carbon::now();

        $category->save();
        return redirect('admin/category/sua/'.$idCategory)->with('thongbao','Sửa chủ đề thành công');
    }

    public function getThem(){
        return view('admin.category.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'title'=>'required'
        ],[
            'title.required'=>'Bạn chưa nhập tên chủ đề'
        ]);
        $category = new Category();
        $category->title = $request->title;
        //$category->created_at = Carbon::now();
        //$category->updated_at = Carbon::now();

        $category->save();
        return redirect('admin/category/danhsach')->with('thongbao','Thêm chủ đề thành công');
    }
}
