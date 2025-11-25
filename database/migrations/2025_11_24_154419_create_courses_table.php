<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('course_name');
        $table->string('course_code')->unique();
        $table->integer('duration_years');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('courses');
}
};