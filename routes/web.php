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
    return view('backend.category.create');
});

//Category Route
Route::resource('category', CategoryController::class)->parameter('category','id');

//Category Route
Route::resource('course', CourseController::class)->parameter('course','id');

//Content Route
Route::resource('content', ContentController::class)->parameter('content','id');
Route::post('test', 'ContentController@store');
