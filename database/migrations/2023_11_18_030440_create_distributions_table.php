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
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade');
            $table->string('slug');
            $table->float('price', 10, 2)->nullable();
            $table->unsignedInteger('stock')->nullable();
            
            $table->enum('status', [1, 2])->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributions');
    }
};