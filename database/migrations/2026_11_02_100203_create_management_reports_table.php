<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('management_reports', function (Blueprint $table) {
            $table->bigIncrements('report_id');

            $table->foreignId('generated_by')
                ->constrained('users', 'user_id')
                ->restrictOnDelete();

            $table->string('title', 200);

            $table->date('period_start')->nullable();
            $table->date('period_end')->nullable();

            $table->text('report_data')->nullable();

            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('management_reports');
    }
};