<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getDanhSach(){
        $categories = Category::all();
        return view('admin.category.danhsach',['categories'=>$categories]);
    }
}
