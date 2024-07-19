<?php

namespace App\Services;

use App\Models\Copy;
use App\Models\Booking;

class BookingService {
    public function createBooking(Copy $copy, string $name) {
        $copy->prestado = true;
        $copy->save();

        $booking = new Booking();
        $booking->copy_id = $copy->id;
        $booking->nombre = $name;
        $booking->fecha_de_prestamo = date('Y-m-d');

        $booking->save();

        return $booking;
    }
}