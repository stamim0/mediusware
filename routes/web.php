<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\islogin;
use App\Http\Middleware\Logincheck;
use Illuminate\Support\Facades\Route;


Route::middleware(islogin::class)->group(function(){
Route::get('/',[UserController::class,'auth'])->name('login') ;
Route::match(['post'],'signup', [ UserController::class,'signup'])->name('signup');
Route::match(['post'],'login', [ UserController::class,'login'])->name('login');
});
Route::middleware(Logincheck::class)->group(function(){
    Route::get('dashboard',[ UserController::class,'index'])->name('dashboard');
    Route::match(['get','post'],'deposit', [TransactionController::class,'deposit'])->name('deposit');
    Route::match(['get','post'],'withdrawl', [TransactionController::class,'withdrawl'])->name('withdrawl');
    Route::get('logout',[ UserController::class,'logout'])->name('logout');
});

