<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::resource('form', FormController::class);

Route::resource('admin', AdminController::class);

Auth::routes();

