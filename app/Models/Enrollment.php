<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;

class Enrollment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_year',
        'status',
    ];

    // Relation to Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relation to Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
