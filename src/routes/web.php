<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeyWordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::prefix('article')->group(function () {
    Route::get('', [ArticleController::class, 'index']);
    Route::post('', [ArticleController::class, 'store']);
    Route::get('/{id}', [ArticleController::class, 'show']);
    Route::put('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
    Route::get('/{id}/', [ArticleController::class, 'comments']);
});

Route::prefix('customer')->group(function () {
    Route::get('', [CustomerController::class, 'index']);
    Route::post('', [CustomerController::class, 'store']);
    Route::get('/{id}', [CustomerController::class, 'show']);
    Route::put('/{id}', [CustomerController::class, 'update']);
    Route::delete('/{id}', [CustomerController::class, 'destroy']);
    Route::get('/customer/{id}', [CustomerController::class, 'getByAuthorId']);
    Route::get('/title/{title}', [CustomerController::class, 'getByTitleContaining']);
    Route::get('/content/{content}/', [CustomerController::class, 'getByContentContaining']);
    Route::get('keywords/{keywords}', [CustomerController::class, 'getByKeywords']);
});

Route::prefix('keyword')->group(function () {
    Route::get('', [CustomerController::class, 'index']);
    Route::post('', [CustomerController::class, 'store']);
    Route::get('/{id}', [CustomerController::class, 'show']);
    Route::delete('/{id}', [CustomerController::class, 'destroy']);
});
