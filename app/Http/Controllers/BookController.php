<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::all()
        ]);
    }

    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'cantidad_de_ejemplares' => 'required',
            'autor' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'cantidad_de_ejemplares' => 'required',
            'autor' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
