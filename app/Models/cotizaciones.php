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
        'descripcion',
        'estado',
        'total',
        'zona',
        'cliente_id',
        'urgencia',
        'urgencia_estado',
    ];

    public function productos()
    {
        return $this->hasMany(Concepto::class, 'cotizacion_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Client::class, 'cliente_id');
    }

}

