<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Result;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'subject_name',
        'subject_code',
        'credit_hours',
        'teacher_id',
    ];

    // Relationship: each subject belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship: each subject belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    // Relationship: each subject has many results
      public function results()
    {
        return $this->hasMany(Result::class);
    }
}

