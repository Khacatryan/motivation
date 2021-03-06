<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/admin')->group(function (){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/add-category', 'CategoryController@addCategory')->name('add.category');
    Route::get('/category', 'CategoryController@showCategory')->name('show.category');
    Route::get('/days-category', 'DaysSingleCategoryController@showDaysCategory')->name('show.days.category');
    Route::get('/add-days-category', 'DaysSingleCategoryController@addDaysCategory')->name('add.days.category');
    Route::get('/task', 'TaskDaysController@showTask')->name('show.task');
    Route::get('/add-task', 'TaskDaysController@addTask')->name('add.task');
    Route::post('/add-task', 'TaskDaysController@selectCategoryTask')->name('send.task');
    Route::get('/notification', 'TaskDaysController@tasksNotification')->name('notification.task');
    Route::get('/add-notification', 'TaskDaysController@addNotification')->name('add.notification');
    Route::get('/edit-category', 'CategoryController@editCategory')->name('edit.category');
    Route::get('/edit-category/{id}', 'CategoryController@editAllCategoryAndTask')->name('edit.all');
    Route::get('/delete-category/{id}', 'CategoryController@deleteCategory')->name('delete.cat');
    Route::get('/edit-day', 'CategoryController@showEditDay')->name('show.days.edit');
    Route::post('/edit-days', 'CategoryController@editDays')->name('edit.day');
    Route::get('/edit-single-days', 'CategoryController@editSingleDay')->name('edit.single.day');
    Route::get('/edit-single-task', 'CategoryController@editSingleTask')->name('edit.single.task');
    Route::get('/edit-task', 'CategoryController@editTaskShow')->name('edit.task');
    Route::post('/edit-tasks', 'CategoryController@editTask')->name('edit.task.single');
});
Route::prefix('/user')->middleware('auth:web')->group(function (){
    Route::post('/day-task','TaskDaysController@taskShow')->name('site.show.task')->middleware('auth');
    Route::post('/completed-task','TaskDaysController@completedTask')->name('site.completed.task');
    Route::get('/category','CategoryController@showAllCategory')->name('site.show.category');
    Route::get('/category-days/{id}','DaysSingleCategoryController@showDays')->name('site.show.days');
    Route::get('/coins','DaysSingleCategoryController@countCoins')->name('site.coins');
});

