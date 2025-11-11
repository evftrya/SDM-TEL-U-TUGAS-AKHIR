<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In database/migrations/2025_11_04_093120_create_pengajuan_table.php
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();

            // FIX: Use uuid() to define the column type to match dosens.id
            $table->uuid('idDosen');

            
            $table->string('periode_id');
            $table->timestamp('tanggal_pengajuan');
            $table->string('status')->default('pending');
            $table->string('TahunAjaranAjuanAwal')->nullable();
            $table->string('TahunAjuanAkhir')->nullable();
            $table->string('semesterAjuan')->nullable();
            $table->unsignedBigInteger('jfaAsal')->nullable();
            $table->unsignedBigInteger('jfaTujuan')->nullable();
            $table->timestamps();
            
            // FIX: Explicitly define the foreign key relationship
            $table->foreign('idDosen')->references('id')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
