<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;

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

//Route::get('/admin/news/create', [NewsController::class, 'add']);

//Route::get('/admin/profile/create', [ProfileController::class, 'add']);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', ],function (){
            Route::get('news/create',[NewsController::class,'add']);
 });

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', ],function (){
            Route::get('profile/create',[ProfileController::class,'add']);
 });
 
 Route::group(['middleware' => ['auth'], 'prefix' => 'admin', ],function (){
            Route::get('profile/edit',[ProfileController::class,'edit']);
 });

// Route::group (['prefix' => 'admin'], function() {
//     Route::get('profile/create',
// 'Admin\ProfileController@add');
//     Route::get('profile/edit',
// 'Admin\ProfileController@edit');
    
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
