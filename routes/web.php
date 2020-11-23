<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\KlassController;
use App\Http\Controllers\Admin\TimeTableController;
use App\Http\Controllers\Admin\GAController;
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
Route::get('/logout',[AuthController::class,'doLogout']);
Route::get('/admin/dashboard',[AdminController::class,'index']);
Route::get('/admin/add-admin',[AdminController::class,'show']);
Route::post('/admin/add-admin',[AdminController::class,'doAddAdmin']);
Route::get('/admin/teacher',[TeacherController::class,'list']);
Route::post('/admin/teacher/add',[TeacherController::class,'add']);
Route::post('/admin/teacher/edit',[TeacherController::class,'edit']);
Route::get('/admin/teacher/delete',[TeacherController::class,'delete']);
Route::get('/admin/subject',[SubjectController::class,'list']);
Route::post('/admin/subject/add',[SubjectController::class,'add']);
Route::post('/admin/subject/edit',[SubjectController::class,'edit']);
Route::post('/admin/subject/delete',[SubjectController::class,'delete']);
Route::get('/admin/room',[RoomController::class,'list']);
Route::post('/admin/room/add',[RoomController::class,'add']);
Route::post('/admin/room/edit',[RoomController::class,'edit']);
Route::post('/admin/room/delete',[RoomController::class,'delete']);
Route::get('/admin/klass',[KlassController::class,'list']);
Route::post('/admin/klass/add',[KlassController::class,'add']);
Route::post('/admin/klass/edit',[KlassController::class,'edit']);
Route::post('/admin/klass/delete',[KlassController::class,'delete']);
Route::get('/admin/timetable',[TimeTableController::class,'index']);
Route::get('/admin/scheduling',[TimeTableController::class,'scheduling']);
Route::post('/admin/scheduling',[GAController::class,'doScheduling']);

