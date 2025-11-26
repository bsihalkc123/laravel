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
        'first_name',
        'last_name',
        'student_code',
        'email',
        'phone_number',
        'date_of_birth',
        'address',
        'course',          // 
        'enrollment_date',
        'status',
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
