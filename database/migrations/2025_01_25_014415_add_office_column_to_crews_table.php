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
        Schema::table('crews', function (Blueprint $table) {
            // Tambahkan kolom office dengan tipe data enum
            $table->enum('office', ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Bali'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crews', function (Blueprint $table) {
            //
            $table->dropColumn('office');
        });
    }
};
