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
        Schema::create('pengawakans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('users_id')->nullable();
            $table->foreignUuid('formasi_id')->nullable();
            // $table->string('type_bagian')->nullable();
            $table->foreignUuid('bagian')->nullable();
            $table->foreignUuid('prodi')->nullable();
            $table->foreignUuid('fakultas')->nullable();
            $table->integer('kuota')->nullable();
            $table->date('tmt_mulai');
            $table->date('tmt_selesai')->nullable();            
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('formasi_id')->references('id')->on('formations')->onDelete('set null');
            $table->foreign('bagian')->references('id')->on('ref_bagians')->onDelete('set null');
            $table->foreign('prodi')->references('id')->on('prodis')->onDelete('set null');
            $table->foreign('fakultas')->references('id')->on('faculties')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengawakans');
    }
};
