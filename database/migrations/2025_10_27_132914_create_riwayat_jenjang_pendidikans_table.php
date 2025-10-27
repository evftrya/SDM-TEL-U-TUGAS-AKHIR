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
        Schema::create('riwayat_jenjang_pendidikans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('users_id')->nullable();
            $table->foreignUuid('jenjang_pendidikan_id')->nullable();
            $table->string('bidang_pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('nama_kampus')->nullable();
            $table->string('alamat_kampus')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('nilai')->nullable();
            $table->string('gelar')->nullable();
            $table->string('singkatan_gelar')->nullable();
            $table->string('ijazah')->nullable();
            $table->timestamps();


            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('jenjang_pendidikan_id')->references('id')->on('ref_jenjang_pendidikans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_jenjang_pendidikans');
    }
};
