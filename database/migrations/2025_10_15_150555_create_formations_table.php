<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_formasi', 50);
            $table->foreignUuid('level_id')->nullable();
            $table->foreignUuid('atasan_formasi_id')->nullable();
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('atasan_formasi_id')->references('id')->on('formations')->onDelete('set null');});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
