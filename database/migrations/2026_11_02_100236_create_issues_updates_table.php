<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('issue_updates', function (Blueprint $table) {
            $table->bigIncrements('update_id');

            $table->foreignId('issue_id')
                ->constrained('issues', 'issue_id')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users', 'user_id')
                ->nullOnDelete();

            $table->enum('old_status', [
                'open',
                'in_progress',
                'resolved',
                'closed'
            ])->nullable();

            $table->enum('new_status', [
                'open',
                'in_progress',
                'resolved',
                'closed'
            ])->nullable();

            $table->enum('old_priority', [
                'low',
                'medium',
                'high',
                'critical'
            ])->nullable();

            $table->enum('new_priority', [
                'low',
                'medium',
                'high',
                'critical'
            ])->nullable();

            $table->text('comment')->nullable();

            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('issue_updates');
    }
};