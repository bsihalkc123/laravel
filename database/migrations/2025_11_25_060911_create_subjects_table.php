<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('subjects', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('course_id');
        $table->string('subject_name');
        $table->string('subject_code')->unique();
        $table->integer('credit_hours');
        $table->unsignedBigInteger('teacher_id');
        $table->timestamps();

        // Foreign Keys
        $table->foreign('course_id')
              ->references('id')->on('courses')
              ->onDelete('cascade');

        $table->foreign('teacher_id')
              ->references('id')->on('teachers')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('subjects');
}
};