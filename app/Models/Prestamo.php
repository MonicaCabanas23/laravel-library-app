<?php

namespace App\Models;

use App\Models\Ejemplar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;

    /* Relationships */
    public function ejemplar()
    {
        return $this->belongsTo(Ejemplar::class);
    }
}
