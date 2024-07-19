<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Services\CopyService;
use Illuminate\Http\Request;

class BookController extends Controller
{

    private BookService $bookService;
    private CopyService $copyService;
    private AuthorService $authorService;

    public function __construct(BookService $bookService, CopyService $copyService, AuthorService $authorService) {
        $this->bookService = $bookService;
        $this->copyService = $copyService;
        $this->authorService = $authorService;
    }

    /* Returns all books */
    public function index()
    {
        $books = [];
        foreach ($this->bookService->findAllSortedById() as $book) {
            $author = $this->authorService->findById($book->author_id);
            $books[] = (object) [
                'id' => $book->id,
                'titulo' => $book->titulo,
                'ubicacion' => $book->ubicacion,
                'ejemplares_disponibles' => $this->copyService->findAvailableCopies($book)->count(),
                'ejemplares_prestados' => $this->copyService->findBorrowedCopies($book)->count(),
                'autor' => $author->nombre
            ];
        }
        return view('pages.books.index', [
            'libros' => $books
        ]);
    }

    /* Returns the view for creating a new book */
    public function create()
    {
        return view('pages.books.create', [
            'autores' => $this->authorService->findAllSortedByName()
        ]);
    }

    /* Store a new book */
    public function store(Request $info)
    {
        $info->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'cantidad_de_ejemplares' => 'required',
            'autor' => 'required',
        ]);

        $autor = $this->authorService->findById($info->autor);
        $book = $this->bookService->createBook($autor, $info);

        /* Create copies */
        for ($i = 0; $i < $info->cantidad_de_ejemplares; $i++) {
            $this->copyService->createCopy($book);
        }

        return redirect(url('/'));
    }

    /* Returns the view for updating a book */
    public function edit($id)
    {
        $book = $this->bookService->findById($id);
        $autor = $this->authorService->findById($book->author_id);
        
        return view('pages.books.edit', [
            'libro' => $book, 
            'autor' => $autor,
            'autores' => $this->authorService->findAllSortedByName()
        ]);
    }

    /* Mehtod for updating a book */
    public function update(Request $info, $id)
    {   
        $info->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'cantidad_de_ejemplares' => 'required',
            'autor' => 'required',
        ]);

        $book = $this->bookService->findById($id);
        $autor = $this->authorService->findByName($info->autor);
        $this->bookService->updateBook($book, $autor, $info);

        return redirect(url('/'));
    }

    /* Deletes the register of a book from the database */
    public function destroy($id)
    {
        $this->bookService->deleteBook($this->bookService->findById($id));

        return redirect(url('/'));
    }
}
