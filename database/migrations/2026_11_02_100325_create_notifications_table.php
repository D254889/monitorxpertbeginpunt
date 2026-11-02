<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notification_id');

            $table->foreignId('issue_id')
                ->constrained('issues', 'issue_id')
                ->cascadeOnDelete();

            $table->foreignId('customer_id')
                ->constrained('customers', 'customer_id')
                ->cascadeOnDelete();

            $table->string('type', 100);
            $table->text('message');

            $table->enum('status', [
                'pending',
                'sent',
                'failed',
                'read'
            ])->default('pending');

            $table->dateTime('sent_at')->nullable();
            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};