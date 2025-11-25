<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Exam;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('exams', function (Blueprint $table) {
        $table->id();
        $table->string('exam_name');
        $table->unsignedBigInteger('course_id');
        $table->year('exam_year');
        $table->string('exam_term'); // 1st, 2nd, 3rd
        $table->date('start_date');
        $table->date('end_date');
        $table->timestamps();

        // Foreign Key
        $table->foreign('course_id')
              ->references('id')
              ->on('courses')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('exams');
}
};
