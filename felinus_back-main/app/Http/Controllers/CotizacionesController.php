<?php

namespace App\Http\Controllers;

use App\Models\cotizaciones;
use Illuminate\Http\Request;
use App\Models\Concepto;

class CotizacionesController extends Controller {

    public function getCotizaciones() {
        $cotizaciones = cotizaciones::where('estado', '=', 'cotizacion')->get();

        foreach($cotizaciones as $cot) {
            $cot->load('productos');
        }

        return response()->json($cotizaciones, 200);
    }

    public function getVenta() {
        $cotizaciones = cotizaciones::where('estado', '=', 'vendido') -> get();
        foreach($cotizaciones as $cot) {
            $cot -> load('productos');
        }
        return response() -> json($cotizaciones, 200);
    }

    public function getCotizacion( $id ) {
        $cotizacion = cotizaciones::find($id);
        if ( is_null($cotizacion) ) {
            return response() -> json(['message' => 'cotizacion not found'], 404);
        }
        $cotizacion -> load('productos');
        return response() -> json($cotizacion, 200);
    }

    public function createCotizacion( Request $request ) {

        $prods = $request -> conceptos;
        $venta_info = $request -> cotizacion;

        $cotizacion = cotizaciones::create([
            'clave_cotizacion' => 'uni'. '-' . uniqid(),
            'fecha_pedido' => $venta_info['fecha_pedido'],
            'nombre_cliente' => $venta_info['nombre_cliente'],
            'telefono' => $venta_info['telefono'],
            'email' => $venta_info['email'],
            'cantidad' => 1,
            'descripcion' => $venta_info['descripcion'],
            'total' => $venta_info['total']
        ]);

        $newProds = [];
        foreach ($prods as $prod) {
            $newProds[] = [
                'cotizacion_id' => $cotizacion->id,
                'producto_id' => $prod['id'],
            ];
        }
        $conceptos = Concepto::insert($newProds);

        return response() -> json([$cotizacion, $prods], 200);
    }

    public function editCotizacion( Request $request, $id ) {
        $cotizacion = cotizaciones::find($id);
        if ( is_null($cotizacion) ) {
            return response() -> json(['message' => 'cotizacion not found'], 404);
        }
        $cotizacion -> update($request -> all());
        $cotizacion -> load('producto');
        return response() -> json($cotizacion, 200);
    }

    public function changeArea(Request $request, $id) {
        $cotizacion = cotizaciones::find($id);
        if ( is_null($cotizacion) ) {
            return response() -> json(['message' => 'cotizacion not found'], 404);
        }
        $cotizacion -> update($request -> all());
        $cotizacion -> load('producto');
        return response() -> json($cotizacion, 200);
    }

    public function deleteCotizacion( $id ) {
        $cotizacion = cotizaciones::find($id);
        if ( is_null($cotizacion) ) {
            return response() -> json(['message' => 'cotizacion not found'], 404);
        }
        $cotizacion -> delete();
        return response() -> json(['message' => 'Deleted cotizacion']);
    }

    public function confirmarCotizacion(Request $request) {
        // return response() -> json($request);
        $cotisacion = cotizaciones::find($request[0]);
        if ( is_null($cotisacion) ) {
            return response() -> json(['message' => 'cotizacion not found'], 404);
        }
        $cotisacion -> estado = 'vendido';
        $cotisacion -> save();
        return response() -> json($cotisacion, 200);
    }
}
