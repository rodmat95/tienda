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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onUpdate('cascade');
            $table->foreignId('transaction_id')->constrained('transactions')->onUpdate('cascade');
            $table->timestamp('sale_date');
            $table->float('discount', 10, 2)->nullable();
            $table->float('shipping', 10, 2);
            $table->float('taxes', 10, 2);
            $table->float('total', 10, 2);
            $table->enum('status', [1, 2])->default(2); // cancelada, en proceso, completada, en revisión, devolución [solicitada, aprobada, rechazada], pendiente de pago, proceso de envío, entregada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};