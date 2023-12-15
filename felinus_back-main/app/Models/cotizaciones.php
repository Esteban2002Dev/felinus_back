<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concepto;

class cotizaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'clave_cotizacion',
        'fecha_pedido',
        'nombre_cliente',
        'telefono',
        'email',
        'cantidad',
        'descripcion',
        'estado',
        'total',
        'zona'
    ];

    // Relación con el modelo Concepto (debería ser en plural)
    public function productos()
    {
        return $this->hasMany(Concepto::class, 'cotizacion_id');
    }

}

