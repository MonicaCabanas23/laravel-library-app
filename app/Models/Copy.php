<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Copy extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'prestrado',
    ];

    /* Relationships */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
