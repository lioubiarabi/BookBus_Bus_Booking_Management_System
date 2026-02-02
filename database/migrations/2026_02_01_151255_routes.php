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
        //
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2);
            $table->integer('duration');
            $table->integer('distance');
            $table->foreignId('cityA')->constrained('cities');
            $table->foreignId('cityB')->constrained('cities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('routes');
    }
};
