<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];

    public function ventas()
    {
        return $this->hasMany(cotizaciones::class, 'cliente_id');
    }
}
