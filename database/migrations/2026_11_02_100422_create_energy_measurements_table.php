<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('energy_measurements', function (Blueprint $table) {
            $table->bigIncrements('measurement_id');

            $table->foreignId('plant_id')
                ->constrained('plants', 'plant_id')
                ->cascadeOnDelete();

            $table->dateTime('measured_at');

            $table->decimal('solar_production', 12, 2)->nullable();
            $table->decimal('wind_production', 12, 2)->nullable();
            $table->decimal('biomass_production', 12, 2)->nullable();

            $table->decimal('temperature', 5, 2)->nullable();
            $table->decimal('efficiency', 5, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('energy_measurements');
    }
};