<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index'])->name('index') ;

Route::match(['get','post'],'signup', [ UserController::class,'signup'])->name('signup');
Route::match(['get','post'],'login', [ UserController::class,'login'])->name('login');

Route::middleware('auth')->group(function(){
    Route::get('dashboard',[ UserController::class,'index'])->name('dashboard');
    Route::match(['get','post'],'deposit', [TransactionController::class,'deposit'])->name('deposit');
    Route::match(['get','post'],'withdrawl', [TransactionController::class,'withdrawl'])->name('withdrawl');
   
});

