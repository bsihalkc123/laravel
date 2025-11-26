<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Subject;

class Result extends Model
{
    protected $fillable = [
        'student_id', 'exam_id', 'subject_id',
        'obtained_marks', 'full_marks', 'pass_marks',
        'grade', 'remarks'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
