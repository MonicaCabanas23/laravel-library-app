<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index($id) {
        $book = Book::findOrFail($id);
        $copies = $book->copies->filter(function($copy) {
            return $copy->prestado === false;
        });

        return view('pages.copies.index', [
            'copies' => $copies,
            'booktitle' => $book->titulo
        ]);
    }

    /* Return view for creating a booking with a specific copy */
    public function borrow($id) {
       $copy = Copy::find($id);
       $copies = $copy->book->copies;
    
        /* Only available copies */
        $copies = $copies->filter(function($copy) {
            return $copy->prestado === false;
        });

        return view('pages.bookings.create', [
            'copy' => $copy,
            'copies' => $copies
        ]);
    }
}
