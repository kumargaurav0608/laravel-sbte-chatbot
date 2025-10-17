<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/chat', function (Request $request) {
//     Log::info('Received message: ' . $request->input('message'));
//     return response()->json(['reply' => 'Hello from Laravel']);
// });


// use App\Http\Controllers\ChatController;

// Route::post('/chat', [ChatController::class, 'respond']);
use App\Http\Controllers\ChatController;

Route::get('/chat/start', [ChatController::class, 'start']);
Route::post('/chat/respond', [ChatController::class, 'respond']);
