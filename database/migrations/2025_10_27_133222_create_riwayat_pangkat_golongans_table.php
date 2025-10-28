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
        Schema::create('riwayat_pangkat_golongans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pangkat_golongan_id')->nullable();
            $table->foreignUuid('dosen_id')->nullable();
            $table->date('tmt_pangkat');
            $table->foreignUuid('sk_llkdikti');
            $table->foreignUuid('sk_pengakuan_ypt');
            $table->timestamps();

            $table->foreign('pangkat_golongan_id')->references('id')->on('ref_pangkat_golongans')->onDelete('set null');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('set null');
            
            $table->foreignUuid('sk_llkdikti_id')->nullable()->constrained('sks')->nullOnDelete();
            $table->foreignUuid('sk_pengakuan_ypt_id')->nullable()->constrained('sks')->nullOnDelete();


        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pangkat_golongans');
    }
};
