<?php

namespace App\Models;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ejemplar extends Model
{
    use HasFactory;

    /* Relationships */
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
