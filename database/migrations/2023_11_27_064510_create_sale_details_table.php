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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('sales')->onUpdate('cascade');
            $table->foreignId('distribution_id')->constrained('distributions')->onUpdate('cascade');
            $table->unique('distribution_id');
            $table->float('unit_price', 10, 2);
            $table->unsignedInteger('quantity');
            $table->float('total_price', 10, 2);
            $table->enum('status', [1, 2])->default(2); // Cancelado, En Tránsito, Pendiente de Envío, Entregado, Devuelto, En Espera de Stock, Reembolsado, En Espera de Pago
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};