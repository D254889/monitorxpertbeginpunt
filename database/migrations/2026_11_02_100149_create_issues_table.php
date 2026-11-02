<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('issue_id');

            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers', 'customer_id')
                ->nullOnDelete();

            $table->foreignId('plant_id')
                ->constrained('plants', 'plant_id')
                ->restrictOnDelete();

            $table->foreignId('issue_type_id')
                ->constrained('issue_types', 'issue_type_id')
                ->restrictOnDelete();

            $table->foreignId('reported_by_user_id')
                ->nullable()
                ->constrained('users', 'user_id')
                ->nullOnDelete();

            $table->foreignId('assigned_technician_id')
                ->nullable()
                ->constrained('users', 'user_id')
                ->nullOnDelete();

            $table->unsignedBigInteger('parent_issue_id')->nullable();

            $table->foreign('parent_issue_id')
                ->references('issue_id')
                ->on('issues')
                ->nullOnDelete();

            $table->enum('priority', [
                'low',
                'medium',
                'high',
                'critical'
            ])->default('medium');

            $table->enum('status', [
                'open',
                'in_progress',
                'resolved',
                'closed'
            ])->default('open');

            $table->enum('source', [
                'customer',
                'technician',
                'admin',
                'system'
            ])->default('system');

            $table->string('external_issue_id', 255)->nullable();

            $table->text('description');

            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('resolved_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};