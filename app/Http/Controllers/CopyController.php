<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index($id) {
        $book = Book::find($id);
        $copies = $book->copies->filter(function($copy) {
            return $copy->prestado === false;
        });

        return view('pages.copies.index', [
            'copies' => $copies,
            'booktitle' => $book->titulo
        ]);
    }
}
