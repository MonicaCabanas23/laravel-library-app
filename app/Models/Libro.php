<?php

namespace App\Models;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
