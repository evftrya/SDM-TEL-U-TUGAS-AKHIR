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
        Schema::create('work_positions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type_work_position');
            $table->string('position_name');
            $table->string('singkatan');
            $table->timestamps();

            $table->foreign('type_work_position')->references('position_name')->on('ref_work_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_positions');
    }
};
