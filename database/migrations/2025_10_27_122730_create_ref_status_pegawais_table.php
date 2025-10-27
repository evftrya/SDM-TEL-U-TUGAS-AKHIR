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
        Schema::create('ref_status_pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('status_pegawai');
            $table->enum('tipe_pegawai',['Dosen','TPA']);
            // $table->enum('status', ['Dosen Tetap', 'Dosen Tamu', 'Honorer', 'Dosen Paruh Waktu','Pegawai Tetap','Pegawai Kontrak','Magang','Outsourcing'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pegawais');
    }
};
