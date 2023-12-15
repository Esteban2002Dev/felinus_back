<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
// RUTAS DE LOGIN
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/{token}/logout', [AuthController::class, 'logout']);
Route::post('/user/newUser', [AuthController::class, 'newUser']);
Route::get('/user/getAllUsers', [AuthController::class, 'getAllUsers']);

// Ruta de prods
Route::get('/products/allProds', [ProductosController::class, 'getProductos']);
Route::get('/products/getProdById/{id}', [ProductosController::class, 'getProdById']);
Route::post('/products/newProduct', [ProductosController::class, 'newProducts']);
Route::delete('/products/deleteProduct/{id}', [ProductosController::class, 'deleteProductById']);

// Ruta de cotizaciones
Route::get('/cotizaciones/allCotizaciones', [CotizacionesController::class, 'getCotizaciones']);
Route::get('/cotizaciones/allVentas', [CotizacionesController::class, 'getVenta']);
Route::get('/cotizaciones/getCotizacionById/{id}', [CotizacionesController::class, 'getCotizacion']);
Route::post('/cotizaciones/new-cotizacion', [CotizacionesController::class, 'createCotizacion']);
Route::put('/cotizaciones/editCotizacion/{id}', [CotizacionesController::class, 'editCotizacion']);
Route::put('/cotizaciones/changeArea/{id}', [CotizacionesController::class, 'changeArea']);
Route::delete('/cotizaciones/deleteCotizacion/{id}', [CotizacionesController::class, 'deleteCotizacion']);
Route::put('/cotizaciones/confirmarCotizacion', [CotizacionesController::class, 'confirmarCotizacion']);

Route::put('/concepto/addConceptos', [ConceptoController::class, 'upConceptos']);

// clientes
Route::get('/clientes/allClientes', [ClientController::class, 'getAllClientes']);
Route::get('/clientes/getClientById/{id}', [ClientController::class, 'getClientById']);
Route::put('/clientes/editClient/{id}', [ClientController::class, 'editClient']);

