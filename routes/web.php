<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employees', EmployeeController::class);
Route::resource('salaries', SalaryController::class);
