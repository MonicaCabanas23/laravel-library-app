<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($id) {
        $book = Book::find($id);
        $copies = $book->copies;

        $filteredCopies = $copies->filter(function($copy) {
            return $copy->prestado === true;
        });

        // Get all bookings for each copy that is borrowed
        $bookings = [];
        foreach($filteredCopies as $copy) {
            $bookings[] = Booking::where('copy_id', $copy->id)->get();
        }

        return view('pages.bookings.index', [
            'bookings' => $bookings,
            'booktitle' => $book->titulo
        ]);
    }
}
