<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;
use Database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    Route::any('/login', [AdminController::class, 'index'])->name('login'); 
        // Matches The "/admin/users" URL
    
    Route::any('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard'); 
        // Matches The "/admin/users" URL
    
    });


//dashboard
// Route::any('/dashboard', [DashboardController::class,'index'])->name('dash');

//users
Route::any('/dashboard/users', [UserController::class,'index'])->name('users');
Route::any('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::any('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

//jobs
Route::any('/dashboard/jobs',  [JobsController::class,'index'])->name('jobs');
Route::any('/job/edit/{id}',   [JobsController::class, 'edit'])->name('job.edit');
Route::any('/job/delete/{id}', [JobsController::class, 'delete'])->name('job.delete');

//departments
Route::any('/dashboard/departments',[DepartmentController::class, 'index'])->name('departments');
Route::any('/department/edit/{id}',[DepartmentController::class,'edit'])->name('department.edit');
Route::any('/department/delete/{id}',[DepartmentController::class,'delete'])->name('department.delete');
