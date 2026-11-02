<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_shares', function (Blueprint $table) {
            $table->bigIncrements('share_id');

            $table->foreignId('report_id')
                ->constrained('management_reports', 'report_id')
                ->cascadeOnDelete();

            $table->foreignId('shared_by')
                ->constrained('users', 'user_id')
                ->restrictOnDelete();

            $table->string('recipient_email', 255);

            $table->dateTime('shared_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_shares');
    }
};