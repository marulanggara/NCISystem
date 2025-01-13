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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string('maps_id');
            $table->string('name');
            $table->string('profile_picture')->nullable();
            $table->string('position')->nullable();
            $table->text('seamanbook_file_path')->nullable();
            $table->text('passport_file_path')->nullable();
            $table->text('medical_file_path')->nullable();
            $table->text('certificate_file_path')->nullable();
            $table->date('born_date')->nullable();
            $table->text('address')->nullable();
            $table->string('next_of_kind')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crews');
    }
};
