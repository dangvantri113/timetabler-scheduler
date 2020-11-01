<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search']);


Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'doLogin']);
Route::get('/admin/dashboard',[AdminController::class,'index']);
Route::get('/admin/add-admin',[AdminController::class,'show']);
Route::post('/admin/add-admin',[AdminController::class,'doAddAdmin']);
Route::get('/admin/teacher',[TeacherController::class,'list']);
Route::post('/admin/teacher/add',[TeacherController::class,'add']);
Route::get('/admin/teacher/edit',[TeacherController::class,'edit']);
