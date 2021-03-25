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
        if($request->hasFile('img')){
            $imgName=$request->img->getClientOriginalName();
            $request->img->storeAs('images',$imgName,'public');

        }
        $category=new Category();
        $category->name=$request->name;
        $category->img=$imgName?$imgName:null;
        $category->save();
        return redirect()->back();
    }
    public function showAllCategory()
    {
        $categories =Category::get();
        return view('site/show-category',compact('categories'));
    }

}
