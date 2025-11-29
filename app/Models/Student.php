<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;
use App\Models\Enrollment;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'date_of_birth',
        'address',
        'course',
        'semester',
        'enrollment_date',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
    // Relation: A student can have many enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
