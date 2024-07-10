<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_de_nacimiento',
    ];

    /* Relationships */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
