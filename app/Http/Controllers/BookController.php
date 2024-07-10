<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $sortedBooks = $books->sortBy('id');
        return view('pages.books.index', [
            'libros' => $sortedBooks
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

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $autor = Author::findOrFail($book->author_id);
        
        return view('pages.books.edit', [
            'libro' => $book, 
            'autor' => $autor,
            'autores' => Author::all()
        ]);
    }

    public function update(Request $info, $id)
    {   
        $info->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'cantidad_de_ejemplares' => 'required',
            'autor' => 'required',
        ]);

        $book = Book::findOrFail($id);
        
        $autor = Author::firstOrCreate([
            'nombre' => $info->autor
        ]);

        $book->titulo = $info->titulo;
        $book->ubicacion = $info->ubicacion;
        $book->cantidad_de_ejemplares = $info->cantidad_de_ejemplares;
        $book->author_id = $autor->id;

        $book->save();

        return redirect(url('/'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect(url('/'));
    }
}
