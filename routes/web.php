<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index'])->name('index') ;

Route::match(['get','post'],'signup', [ UserController::class,'signup'])->name('signup');
Route::match(['get','post'],'login', [ UserController::class,'login'])->name('login');

Route::get('show', [TransactionController::class,'show']);
Route::get('deposit', [TransactionController::class,'deposit']);
Route::post('deposit', [TransactionController::class,'show']);
Route::get('withdrawl', [TransactionController::class,'show']);
Route::post('withdrawl', [TransactionController::class,'show']);
