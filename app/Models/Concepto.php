<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productos;

class Concepto extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'cotizacion_id',
    ];


    public function producto()
    {
        return $this->belongsTo(productos::class, 'producto_id');
    }
    
}
