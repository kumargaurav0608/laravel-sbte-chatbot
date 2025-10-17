<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
// backend/routes/web.php

use App\Http\Controllers\ChatController;

Route::view('/admin', 'admin');


// Route::get('/chat', function () {
//     return response()->json(['status' => 'GET route working']);
// });

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.categories.index');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('answers', AnswerController::class);
});

Route::resource('answers', AnswerController::class);

Route::resource('questions', QuestionController::class);

