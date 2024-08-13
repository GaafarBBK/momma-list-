<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// User routes
Route::get('/user/showall',[UserController::class, 'index']);
Route::post('/user/add',[UserController::class, 'store']);
Route::put('/user/update/{id}',[UserController::class, 'update']);
Route::post('/user/delete/{id}',[UserController::class, 'delete']);


// Task routes
Route::post('/task/store',[TaskController::class,'store']);
Route::get('/task/show',[TaskController::class,'index']);