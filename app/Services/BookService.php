<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Author;

class BookService {
    public function createBook(Author $author, $info) {
        $book = new Book(); 
        $book->titulo = $info->titulo;
        $book->ubicacion = $info->ubicacion;
        $book->cantidad_de_ejemplares = $info->cantidad_de_ejemplares;
        $book->author_id = $author->id;

        $book->save();

        return $book;
    }

    public function updateBook(Book $book, Author $author, $info) {
        $book->titulo = $info->titulo;
        $book->ubicacion = $info->ubicacion;
        $book->cantidad_de_ejemplares = $info->cantidad_de_ejemplares;
        $book->author_id = $author->id;

        $book->save();
        return $book;
    }

    public function deleteBook(Book $book) {
        $book->delete();
    }

    public function findById(int $id) {
        return Book::findOrFail($id);
    }

    public function findAllSortedById() {
        $books = Book::all();
        return $books->sortBy('id');
    }
}