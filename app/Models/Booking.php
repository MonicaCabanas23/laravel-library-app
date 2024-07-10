<?php

namespace App\Models;

use App\Models\Copy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_de_prestramo',
        'fecha_de_devolucion',
        'copy_id', 
    ];

    /* Relationships */
    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }
}
