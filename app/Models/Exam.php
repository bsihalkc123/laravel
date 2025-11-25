<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;

class Exam extends Model
{
    protected $fillable = [
        'exam_name',
        'course_id',
        'exam_year',
        'exam_term',
        'start_date',
        'end_date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

