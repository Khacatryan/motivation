<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Completed;
use App\Models\DaysSingleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaysSingleCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
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
      return redirect()->back();
  }

  public function showDays(Request $request)
  {
      $day=DaysSingleCategory::where('category_id',$request->id)->min('id');
      $days=DaysSingleCategory::with('completed')->where('category_id',$request->id)->get();
      $completed=Completed::where('day_id',$day )->where('user_id',Auth::id())->first();
      if($completed==null){
          Completed::insert([
              'user_id'=>Auth::id(),
              'day_id'=>$day,
              'seen'=>true
          ]);
      }
      $currentShowed = auth()->user()['completed'];
      $countCoins=self::countCoins();
      $currentShowed = $currentShowed?$currentShowed->groupBy('day_id'):$currentShowed;
      return view('site/show-days-category',compact('days','currentShowed','countCoins'));
  }
    public static function countCoins()
    {
        $countCoins=[];
        $coins=Completed::select('coins')->get();
        foreach ($coins as $coin){
            if($coin->coins!=null){
                array_push($countCoins,$coin->coins);
            }
        }
        $countCoins= count($countCoins)*2;
        return $countCoins;
    }
}
