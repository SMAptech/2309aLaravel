<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('register','register')->name('register');
Route::view('login','login')->name('login');
Route::view('userDashboard','userDashboard')->name('userDashboard')->middleware('check_role');




Route::post('registerPost',[UserController::class,'register'])->name('register.post');

Route::post('loginPost',[UserController::class,'login'])->name('login.post');

route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware('check_role');
route::get('logoout',[UserController::class,'logout'])->name('logout');
route::get('category',[UserController::class,'category'])->name('category')->middleware('is_user');
