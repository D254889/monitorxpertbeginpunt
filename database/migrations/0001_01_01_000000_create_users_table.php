<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');

            $table->foreignId('role_id')
                ->constrained('roles', 'role_id')
                ->restrictOnDelete();

            $table->string('name', 150);
            $table->string('email', 255);
            $table->string('phone', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};