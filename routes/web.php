<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use pp\Http\Controllers\Admin\Auth\LoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|
--------------------------------------------------------------------------
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

Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login/post', [LoginController::class, 'login'])->name('admin.login.post');

Route::get('/online-webinar/{link}', [FrontController::class, 'register_link'])->name('register_link');
Route::post('/online-webinar/register', [FrontController::class, 'register_user'])->name('register_user');
Route::get('/online-webinar/registration/thankyou', [FrontController::class, 'thankyou'])->name('thankyou');


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  

    // webinars

    Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::post('/admin/generate-link', [AdminController::class, 'generate_link'])->name('admin.generate_link');

    Route::get('/admin/webinars', [AdminController::class, 'webinars'])->name('admin.webinars');
    Route::get('/admin/webinars/status/{id}', [AdminController::class, 'toggle_status'])->name('admin.webinars.toggle_status');
    Route::get('/admin/webinars/add', [AdminController::class, 'add_webinar'])->name('admin.webinar.add');
    Route::post('/admin/webinars/store', [AdminController::class, 'store_webinar'])->name('admin.webinar.store');
    Route::get('/admin/webinars/edit/{webinars:id}', [AdminController::class, 'edit_webinar'])->name('admin.webinar.edit');
    Route::post('/admin/webinars/update', [AdminController::class, 'update_webinar'])->name('admin.webinar.update');



    // students

    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/admin/students/status/{id}', [AdminController::class, 'student_toggle_status'])->name('admin.student_toggle_status');

    Route::get('/admin/students/add', [AdminController::class, 'add_student'])->name('admin.student.add');




});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


