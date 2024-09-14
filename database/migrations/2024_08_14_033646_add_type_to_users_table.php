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
            $table->tinyInteger('type')->default(0)->after('password'); // Users: 0=>User, 1=>Admin, 2=>Manager
            $table->string('role')->default('user')->after('type'); // Default role is 'user'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('type'); // Remove the 'type' column
            $table->dropColumn('role'); // Remove the 'role' column
        });
    }
};
