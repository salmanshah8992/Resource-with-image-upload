<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\CustomerController;

Route::resource('employe', EmployeController::class);
Route::resource('customer', CustomerController::class);