<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Copy;

class CopyService {

    /**
     * Create a new copy of a book
     */
    public function createCopy(Book $book) {
        $copy = new Copy();
        $copy->prestado = false;
        $copy->book_id = $book->id;

        $copy->save();

        $book->copies()->save($copy);

        return $copy;
    }

    /**
     * Get all available copies of a book
     */
    public function findAvailableCopies(Book $book) {
        return $book->copies->filter(function($copy) {
            return $copy->prestado === false;
        });
    }

    /**
     * Get all borrowed copies of a book
     */
    public function findBorrowedCopies(Book $book) {
        return $book->copies->filter(function($copy) {
            return $copy->prestado === true;
        });
    }
}