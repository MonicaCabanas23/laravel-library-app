<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', BookController::class . '@index');

Route::get('/books/create', BookController::class . '@create');

Route::post('/books/store', BookController::class . '@store')->name('books.store');

Route::get('/books/edit', BookController::class . '@edit')->name('books.edit');
