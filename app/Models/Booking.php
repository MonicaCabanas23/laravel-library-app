<?php

namespace App\Models;

use App\Models\Copy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    /* Relationships */
    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }
}
