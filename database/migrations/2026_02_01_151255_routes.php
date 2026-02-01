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
            $table->foreignId('departure_city')->constrained('cities');
            $table->foreignId('arrival_city')->constrained('cities');
            $table->foreignId('busId')->constrained('buses');
            $table->foreignId('driverId')->constrained('users');
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
