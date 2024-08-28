<?php

use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PasswordController::class,'show']);
Route::post('/',[PasswordController::class,'generate'])->name('password.generate');