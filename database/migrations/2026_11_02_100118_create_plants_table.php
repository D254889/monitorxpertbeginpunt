<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->bigIncrements('plant_id');

            $table->foreignId('factory_id')
                ->constrained('factories', 'factory_id')
                ->restrictOnDelete();

            $table->string('name', 150);
            $table->string('location', 255);
            $table->string('capacity', 100)->nullable();
            $table->string('status', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};