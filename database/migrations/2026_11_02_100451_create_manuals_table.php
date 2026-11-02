<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manuals', function (Blueprint $table) {
            $table->bigIncrements('manual_id');

            $table->foreignId('plant_id')
                ->constrained('plants', 'plant_id')
                ->cascadeOnDelete();

            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->string('document_url', 500)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manuals');
    }
};