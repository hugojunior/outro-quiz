<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('home-public');
});

Route::middleware(['auth'])->group(function () {

    // HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ACCOUNT
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account/edit', [AccountController::class, 'update'])->name('account.update');
    Route::get('/account/password', [AccountController::class, 'password'])->name('account.password');
    Route::patch('/account/password', [AccountController::class, 'passwordUpdate'])->name('account.password.update');
    Route::get('/account/delete', [AccountController::class, 'delete'])->name('account.delete');
    Route::delete('/account/delete', [AccountController::class, 'destroy'])->name('account.destroy');

    // QUIZ - MANAGE
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes/create', [QuizController::class, 'store'])->name('quizzes.store');
    Route::get('/quizzes/{quizID}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::get('/quizzes/{quizID}/reports', [QuizController::class, 'report'])->name('quizzes.report');
    Route::get('/quizzes/{quizID}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::patch('/quizzes/{quizID}', [QuizController::class, 'update'])->name('quizzes.update');
    Route::get('/quizzes/{quizID}/delete', [QuizController::class, 'delete'])->name('quizzes.delete');
    Route::delete('/quizzes/{quizID}', [QuizController::class, 'destroy'])->name('quizzes.destroy');

    // QUIZ - SHARE
    Route::get('/{user}/{quizID}', [QuizController::class, 'share'])->name('quizzes.share');
});
