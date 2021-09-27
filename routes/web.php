<?php

use App\Http\Controllers\AdminController;
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


Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'Admin_auth'],function(){

   Route::get('/dashboard',[AdminController::class,'dashboard']);
   Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

});
