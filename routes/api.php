<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');

});
Route::apiResource('projects','App\Http\Controllers\ProjectController');
Route::apiResource('tasks','App\Http\Controllers\TaskController');
Route::get('mytasks/{id}',['App\Http\Controllers\TaskController','showTasksOfUser']);
Route::put('mytasks/{id}',['App\Http\Controllers\TaskController','submitTask']);



