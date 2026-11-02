<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_tasks', function (Blueprint $table) {
            $table->bigIncrements('task_id');

            $table->foreignId('plant_id')
                ->constrained('plants', 'plant_id')
                ->cascadeOnDelete();

            $table->foreignId('technician_id')
                ->nullable()
                ->constrained('users', 'user_id')
                ->nullOnDelete();

            $table->string('task_type', 150);
            $table->text('description');

            $table->enum('status', [
                'pending',
                'scheduled',
                'in_progress',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->enum('priority', [
                'low',
                'medium',
                'high',
                'critical'
            ])->default('medium');

            $table->dateTime('scheduled_date')->nullable();
            $table->dateTime('completed_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_tasks');
    }
};