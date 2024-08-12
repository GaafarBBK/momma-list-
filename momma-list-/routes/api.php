<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;

Route::get('/showall',[UserController::class, 'index']);
Route::post('/store',[UserController::class, 'store']);
Route::put('/update',[UserController::class, 'update']);
Route::post('/delete',[UserController::class, 'delete']);
