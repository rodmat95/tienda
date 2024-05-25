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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('document_serie')->nullable(); // F001, B001
            $table->string('document_number')->nullable(); // 000123
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onUpdate('cascade');
            $table->unique('customer_id');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onUpdate('cascade');
            $table->unique('supplier_id');
            $table->timestamp('transaction_date'); // fecha de transacción
            $table->timestamp('due_date')->nullable(); // fecha de vencimiento
            $table->string('type'); // ventas, devoluciones, gastos, transferencias, ingresos, contratos, descuentos, promociones, pagos de préstamos
            $table->float('subtotal', 10, 2);
            $table->float('discount', 10, 2)->nullable();
            $table->float('taxes', 10, 2);
            $table->float('total', 10, 2);
            $table->enum('status', [1, 2, 3, 4, 5])->default(2); // cancelada, en curso, procesada, rechazada, pendiente de pago
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};