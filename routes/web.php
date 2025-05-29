<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LightController;
use App\Http\Controllers\MailController;

//Route::get('/', function () {
   // return view('welcome');
//});


Route::get('/student', [UserController::class, 'webTasks']);


//Route::get('/light', [LightController::class, 'getState'])->name('light');




//Route::get('/light', [LightController::class, 'index']); // API to get light state
Route::post('/light/toggle', [LightController::class, 'toggle']); // Toggle API
Route::get('/light-view', [LightController::class, 'showLight']); // Web View



Route::get('/', function () {
    return view('contact_form');
});

Route::post('/send', [MailController::class,"sendContactMail"])->name('send.contact_mail');