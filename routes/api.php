<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::get('/', [PropertyController::class, 'list']);
Route::post('/', [PropertyController::class, 'store']);
Route::post('/api/store', [PropertyController::class, 'storeDataUsingAPI']);