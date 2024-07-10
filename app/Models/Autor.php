<?php

namespace App\Models;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    /* Relationships */
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
