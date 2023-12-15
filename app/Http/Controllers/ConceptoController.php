<?php

namespace App\Http\Controllers;

use App\Models\Concepto;
use Illuminate\Http\Request;

class ConceptoController extends Controller
{
    public function upConceptos( Request $request ) {
        concepto::create([
            'cotizacion_id' => $request -> cotizacion_id,
            'producto_id' => $request -> producto_id,
        ]);
    }
}
