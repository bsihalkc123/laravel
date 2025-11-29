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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('student_code')->unique();
            $table->string('first_name');
            $table->string('last_name');

            $table->string('email')->unique();
            $table->string('phone_number');

            $table->date('date_of_birth');
            $table->string('address');

            // Course & Semester
            $table->string('course');          // e.g. "BSC.CSIT"
            $table->string('semester');        // e.g. "1st Semester", "2nd", "6th"

            $table->date('enrollment_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};