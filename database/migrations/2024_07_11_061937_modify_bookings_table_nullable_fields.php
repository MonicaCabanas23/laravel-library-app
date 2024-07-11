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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('fecha_de_devolucion')->nullable()->change();
            // Puedes añadir más campos aquí si es necesario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('fecha_de_devolucion')->nullable(false)->change();
            // Revertir los cambios adicionales aquí si es necesario
        });
    }
};
