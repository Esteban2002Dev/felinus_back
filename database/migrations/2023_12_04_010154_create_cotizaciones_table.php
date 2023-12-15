<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('clave_cotizacion');
            $table->string('fecha_pedido');
            // $table->string('nombre_cliente');
            // $table->string('telefono');
            // $table->string('email');
            $table->text('descripcion');
            $table->text('zona') -> default('diseño');
            $table->text('estado') -> default('cotizacion');
            $table->integer('total');
            $table->foreignId('cliente_id')->constrained('clients')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
