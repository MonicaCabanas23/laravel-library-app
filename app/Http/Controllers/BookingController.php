<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copy;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /* Get all active bookings of a book */
    public function index($id) {
        $book = Book::find($id);
        $copies = $book->copies;

        $filteredCopies = $copies->filter(function($copy) {
            return $copy->prestado === true;    
        });

        // Get all bookings for each copy that is borrowed
        $copyIds = $filteredCopies->pluck('id');
        $bookings = Booking::whereIn('copy_id', $copyIds)
                        ->whereNull('fecha_de_devolucion')
                        ->get();


        return view('pages.bookings.index', [
            'bookings' => $bookings,
            'booktitle' => $book->titulo
        ]);
    }

    /* Return view for creating a booking */
    public function create($id) {
        $book = Book::find($id);
        $copies = $book->copies;

        /* Only available copies */
        $copies = $copies->filter(function($copy) {
            return $copy->prestado === false;
        });

        return view('pages.bookings.create', [
            'book' => $book,
            'copy' => null,
            'copies' => $copies
        ]);
    }

    /* Method for borrowing a copy*/
    public function store(Request $request) {
        $request->validate([
            'copy_id' => 'required',
            'nombre' => 'required',
        ]);

        $copy = Copy::find($request->copy_id);
        $copy->prestado = true;
        $copy->save();

        $booking = new Booking();
        $booking->copy_id = $request->copy_id;
        $booking->nombre = $request->nombre;
        $booking->fecha_de_prestamo = date('Y-m-d');

        $booking->save();

        return redirect(url('/'));
    }

    /* Method for returning a copy and assigning a return date to the booking */
    public function update($id) {
        $booking = Booking::find($id);
        $booking->fecha_de_devolucion = date('Y-m-d');
        $booking->save();

        $copy = Copy::find($booking->copy_id);
        $copy->prestado = false;
        $copy->save();

        return redirect(url('/'));
    }
}
