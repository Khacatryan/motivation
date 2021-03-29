<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DaysSingleCategory;
use App\Models\TaskDays;
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

    public function editCategory()
    {
        $category= Category::all();
        return view('admin/edit-category',compact('category'));
    }

    public function editAllCategoryAndTask(Request $request)
    {
        $category=Category::where('id',$request->id)->first();
        $category->update([
            'name'=>$request->name,
        ]);
        $category->save();
        return redirect()->back();

    }
    public function deleteCategory($id)
    {
        $category=Category::where('id',$id)->delete();
        return redirect()->back();
    }

    public function showEditDay()
    {
        $category=Category::get();
        return view('admin/edit-categoryDaysTask',compact('category'));
    }
    public function editDays(Request $request)
    {
        $days=DaysSingleCategory::where('category_id',$request->cat_id)->get();

        return response()->json($days);
    }

    public function editSingleDay(Request $request)
    {
        $days=DaysSingleCategory::where('id',$request->id)->first();

        $days->update([
            'name'=>$request->name
        ]);
        $days->save();
        return redirect()->back();
    }
    public function editTaskShow()
    {
        $category=Category::get();
        return view('admin/edit-task',compact('category'));
    }
    public function editTask(Request $request)
    {
        $task=TaskDays::where('days_single_id',$request->id)->get();
        return response()->json($task);
    }
    public function editSingleTask(Request $request)
    {
        $task=TaskDays::where('id',$request->id)->first();

        $task->update([
            'name'=>$request->name
        ]);
        $task->save();
        return redirect()->back();
    }

}
