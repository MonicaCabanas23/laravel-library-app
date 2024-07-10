<?php

namespace App\Http\Controllers;

use App\Models\Author;
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
        return view('pages.books.create', [
            'autores' => Author::all()
        ]);
    }

    public function store(Request $info)
    {
        $info->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'cantidad_de_ejemplares' => 'required',
            'autor' => 'required',
        ]);

        $autor = Author::firstOrCreate([
            'nombre' => $info->autor
        ]);

        $book = new Book(); 
        $book->titulo = $info->titulo;
        $book->ubicacion = $info->ubicacion;
        $book->cantidad_de_ejemplares = $info->cantidad_de_ejemplares;
        $book->author_id = $autor->id;

        $book->save();


        return redirect(url('/'));
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
