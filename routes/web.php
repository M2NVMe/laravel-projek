<?php

use App\Http\Controllers\Admin\admindepartment;
use App\Http\Controllers\Admin\admingrade;
use App\Http\Controllers\Admin\adminpage;
use App\Http\Controllers\Admin\adminstudents;
use App\Http\Controllers\contact;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Grades;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']); // Points to HomeController
Route::get('/contact', [contact::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);
Route::get('/grades', [Grades::class, 'index']);
Route::get('/department', [DepartmentController::class, 'index']);

Route::prefix('adminpage')->group(function () {
    Route::get('/', [adminpage::class, 'index']);
    Route::prefix('students')->group(function() {
        Route::get('/', [adminstudents::class, 'index']);
        Route::get('/create', [adminstudents::class, 'create']);
        Route::post('/store', [adminstudents::class, 'store']);
        Route::get('/edit/{id}', [adminstudents::class, 'edit']); // Fixed placeholder
        Route::put('/update/{id}', [adminstudents::class, 'update']); // Fixed placeholder
        Route::delete('/delete/{id}', [adminstudents::class, 'destroy']); // Fixed placeholder
    });
    Route::prefix('grades')->group(function() {
        Route::get('/', [admingrade::class, 'index']);
    });
    Route::prefix('departments')->group(function() {
        Route::get('/', [admindepartment::class, 'index']);
    });
});
