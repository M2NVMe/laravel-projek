<?php

use App\Http\Controllers\contact;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepratmentController;
use App\Http\Controllers\Grades;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestControl;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);  // Uses TestControl

Route::get('/contact', [contact::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/grades', [Grades::class, 'index']);

Route::get('/department', [DepartmentController::class, 'index']);
