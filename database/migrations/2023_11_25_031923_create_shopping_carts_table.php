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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();

            $table->string('session_id')->nullable();
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('set null');
            $table->unique('session_id');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onUpdate('cascade');
            $table->unique('customer_id');

            $table->enum('status', [1, 2])->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};