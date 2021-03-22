<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory()
    {
        return view('admin/add-category');
    }
    public function addCategory(Request $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->back();

    }

}
