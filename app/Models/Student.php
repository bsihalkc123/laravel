<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
