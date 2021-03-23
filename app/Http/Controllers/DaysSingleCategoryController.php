<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DaysSingleCategory;
use Illuminate\Http\Request;

class DaysSingleCategoryController extends Controller
{
  public function showDaysCategory()
  {
      $category=Category::get();
      return view('admin/add-days-single-category',compact('category'));
  }
  public function addDaysCategory(Request $request)
  {
      $category=Category::find($request->id);
      $daysCategory= new DaysSingleCategory();
      $daysCategory->name=$request->name;
      $category->daysSingleCategory()->save($daysCategory);
      return redirect()->back();
  }

  public function showDays(Request $request)
  {
      $days=DaysSingleCategory::where('category_id',$request->id)->get();
      return view('site/show-days-category',compact('days'));
  }
}
