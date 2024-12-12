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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('grade_level', ['kindergarten', 'first_grade', 'second_grade', 'third_grade', 'fourth_grade', 'fifth_grade', 'sixth_grade', 'seventh_grade', 'eighth_grade', 'ninth_grade', 'tenth_grade', 'eleventh_grade', 'twelfth_grade']);
            $table->string('room_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};