<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_code', 'first_name', 'last_name', 
        'email', 'phone', 'qualification', 'address'
    ];
}
