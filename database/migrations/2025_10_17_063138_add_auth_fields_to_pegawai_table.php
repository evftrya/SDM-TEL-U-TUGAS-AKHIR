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
        Schema::table('pegawai', function (Blueprint $table) {
            $table->string('email')->unique()->nullable()->after('password_hash');
            $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->rememberToken()->after('email_verified_at');
            $table->boolean('is_admin')->default(false)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn(['email', 'email_verified_at', 'remember_token', 'is_admin']);
        });
    }
};
