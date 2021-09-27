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


Route::get('/login',[AdminController::class,'index'])->name('login.index');
Route::post('/login/auth',[AdminController::class,'auth'])->name('login.auth');

Route::group(['Middleware'=>'Admin_auth'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);

Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');

});
