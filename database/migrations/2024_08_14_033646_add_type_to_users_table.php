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
        Schema::table('users', function (Blueprint $table) {
            // Cek apakah kolom 'type' sudah ada
            if (!Schema::hasColumn('users', 'type')) {
                $table->tinyInteger('type')->default(0)->after('password'); // Users: 0=>User, 1=>Admin, 2=>Manager
            }
            
            // Cek apakah kolom 'role' sudah ada
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user')->after('type'); // Default role is 'user'
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom 'type' jika ada
            if (Schema::hasColumn('users', 'type')) {
                $table->dropColumn('type');
            }
            
            // Hapus kolom 'role' jika ada
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
