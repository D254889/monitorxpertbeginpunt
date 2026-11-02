<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_logs', function (Blueprint $table) {
            $table->bigIncrements('log_id');

            $table->string('source', 150);
            $table->string('external_id', 255)->nullable();

            $table->text('message')->nullable();
            $table->text('payload')->nullable();

            $table->string('status', 50)->nullable();

            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_logs');
    }
};