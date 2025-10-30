<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionController;

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');
