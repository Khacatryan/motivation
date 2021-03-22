<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DaysSingleCategory;
use Illuminate\Http\Request;

class TaskDaysController extends Controller
{
    public function showTask()
    {
        $category=Category::get();
        return view('admin/add-task',compact('category'));

    }
    public function selectCategoryTask(Request $request)
    {
        $daysCat=DaysSingleCategory::where('category_id',$request->cat_id)->get();
        return response()->json($daysCat);
    }
}
