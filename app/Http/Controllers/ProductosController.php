<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller {

    public function getProductos() {
        $products = productos::get();
        return response() -> json($products, 200);
    }
    public function getProdById( $id ) {
        $product = productos::find($id);
        if ( is_null($product) ) {
            return response() -> json('No existe el producto', 404);
        }
        return response() -> json($product, 200);
    }

    public function newProducts( Request $request ): JsonResponse {

        try {
            $validator = $request -> validate([
                'nombre' => ['required', 'string', 'max:200'],
                'descripcion' => ['required', 'string', 'max:550'],
                'precio' => ['required', 'numeric'],
                'imagen' => ['required'],
            ]);

            $product = productos::create([
                'nombre' => $request -> nombre,
                'descripcion' => $request -> descripcion,
                'precio' => $request -> precio,
                'imagen' => $request -> imagen,
            ]);
            return response() -> json($product);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function deleteProductById( $id ) {
        $prod = productos::find($id);
        if ( is_null($prod) ) {
            return response() -> json(['message' => 'Product not found'], 404);
        }
        $prod -> delete();
        return response() -> json(['message' => 'Deleted Product']);
    }

}
