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
    Route::get('/add-category', 'CategoryController@addCategory')->name('add.category');
    Route::get('/category', 'CategoryController@showCategory')->name('show.category');
    Route::get('/days-category', 'DaysSingleCategoryController@showDaysCategory')->name('show.days.category');
    Route::get('/add-days-category', 'DaysSingleCategoryController@addDaysCategory')->name('add.days.category');
    Route::get('/task', 'TaskDaysController@showTask')->name('show.task');
    Route::get('/add-task', 'TaskDaysController@addTask')->name('add.task');
    Route::post('/add-task', 'TaskDaysController@selectCategoryTask')->name('send.task');

});

