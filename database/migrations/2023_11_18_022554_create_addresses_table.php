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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            
            $table->string('street');
            $table->unsignedInteger('number');
            $table->foreignId('department_id')->constrained('departments')->onUpdate('cascade');
            $table->foreignId('province_id')->constrained('provinces')->onUpdate('cascade');
            $table->foreignId('district_id')->constrained('districts')->onUpdate('cascade');
            $table->unsignedInteger('postal_code');
            $table->text('reference');
            
            $table->unsignedBigInteger('addressable_id');
            $table->string('addressable_type');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};