<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', BookController::class . '@index');

Route::get('/books/create', BookController::class . '@create');

Route::post('/books/store', BookController::class . '@store')->name('books.store');

Route::get('/books/edit/{id}', BookController::class . '@edit')->name('books.edit');

Route::put('/books/update/{id}', BookController::class . '@update')->name('books.update');

Route::delete('/books/destroy/{id}', BookController::class . '@destroy')->name('books.destroy');