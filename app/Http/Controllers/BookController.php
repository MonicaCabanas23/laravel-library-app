<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('pages.books.index', [
            'libros' => Book::all()
        ]);
    }

    public function show(Book $book)
    {
        return view('pages.books.show', [
            'libro' => $book
        ]);
    }

    public function create()
    {
        return view('pages.books.create');
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

        return redirect()->route('pages.books.index');
    }

    public function edit(Book $book)
    {
        return view('pages.books.edit', [
            'libro' => $book
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

        return redirect()->route('pages.books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('pages.books.index');
    }
}
