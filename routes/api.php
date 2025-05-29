<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LightController;
use App\Http\Controllers\AngleController;
use App\Http\Controllers\StreamController;








Route::get('/esp32-stream', [StreamController::class, 'fetchStream']);


Route::get('/angle', [AngleController::class, 'index']); 
Route::post('/angle/update', [AngleController::class, 'update']); 


Route::post('/tasks', [UserController::class, 'store']); 
Route::get('/tasks', [UserController::class, 'index']);



Route::get('/light', [LightController::class, 'index']); 
Route::post('/light/toggle', [LightController::class, 'toggle']);

//Route::get('/light', [LightController::class, 'getState']);

//Route::post('/get-state', [LightController::class, 'toggle'])->name('toggle.button');




