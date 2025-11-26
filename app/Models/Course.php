<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Enrollment;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_code',
        'duration_years',
    ];
    public function subjects()
{
    return $this->hasMany(Subject::class);
}
public function students()
{
    return $this->hasMany(Student::class);
}
public function exams()
{
    return $this->hasMany(Exam::class);
}
public function enrollments()
{
    return $this->hasMany(Enrollment::class);

}
}
