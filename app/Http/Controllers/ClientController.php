<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller {

    public function getAllClientes() {
        $clientes = Client::all();
        foreach( $clientes as $cliente ) {
            $cliente -> load('ventas');
            $cliente -> ventas -> load('productos');
            // $cliente -> ventas -> productos -> load('producto');
        }
        return response()->json($clientes, 200);
    }

    public function getClientById($id) {
        $client = Client::find($id);
        if (is_null($client)) {
            return response() -> json('No existe el cliente', 404);
        }
        $client->load('ventas.productos.producto');
        return response() -> json($client, 200);
    }

    public function editClient(Request $request, $id) {
        $cliente = Client::find($id);
        if (is_null($cliente)) {
            return response() -> json('No existe el cliente', 404);
        }
        $cliente -> update([
            'nombre' => $request -> nombre_cliente,
            'telefono' => $request -> telefono,
            'email' => $request -> telefono,
        ]);

        $cliente->load('ventas.productos.producto');
        return response() -> json($cliente, 200);
    }
}
