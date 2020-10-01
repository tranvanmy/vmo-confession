<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    //
    public function getThongKeBaiPost(){
        $category = Category::all();
        $namhientai = Carbon::now()->year;
        $namxet = Carbon::now()->year;
        return view('admin.thongke.baipost',['category'=>$category,'namhientai'=>$namhientai,'namxet'=>$namxet]);
    }

    public function getBaiPostTrave(Request $request){
        $category = Category::all();
        $namhientai = Carbon::now()->year;
        $namxet = $request->nam;
        return view('admin.thongke.baipost',['category'=>$category,'namhientai'=>$namhientai,'namxet'=>$namxet]);
    }
}
