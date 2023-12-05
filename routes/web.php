<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index']);
Route::post('/', [MainController::class,'store']);
Route::get('/delete/{id}', [MainController::class,'delete']);
