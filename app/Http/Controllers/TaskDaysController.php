<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DaysSingleCategory;
use App\Models\Notification;
use App\Models\TaskDays;
use Faker\Provider\DateTime;
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
    public function addTask(Request $request)
    {
        $task=new TaskDays();
        $task->category_id=$request->id;
        $task->days_single_id=$request->singl_id;
        $task->name=$request->name;
        $task->save();
        return redirect()->back()->with('message','Task add successfully');
    }

    public function taskShow(Request $request)
    {
        $nextDayID = DaysSingleCategory::where('id', '>', $request->day_id)->min('id');
               DaysSingleCategory::where('id',$request->day_id)->update([
           'seen'=>true
        ]);
                DaysSingleCategory::where('id',$nextDayID)->update([
            'seen'=>true
        ]);
        $task=TaskDays::where('days_single_id',$request->day_id)->get();
        return response()->json($task);
    }
     public function completedTask(Request $request)
     {

         DaysSingleCategory::where('id',$request->days_id)->update([
             'completed'=>true
         ]);
         $not=Notification::where('days_single_id',$request->days_id)->get();
         return redirect()->back()->with('message',$not[0]['title']);
     }
     public function tasksNotification()
     {
         $category=Category::get();
         return view('admin/add-notification',compact('category'));
     }
     public function addNotification(Request $request)
     {
         $notifications=new Notification();
         $notifications->title=$request->title;
         $notifications->days_single_id=$request->singl_id;
         $notifications->save();
         return redirect()->back()->with('message','Notification add successfully');

     }

}
