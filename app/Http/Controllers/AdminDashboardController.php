<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Exam;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Counts for dashboard cards
        $counts = [
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'courses' => Course::count(),
            'subjects' => Subject::count(),
            'exams' => Exam::count(),
        ];

        // Roles and permissions for the table
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('backend.Admindashboard', compact('counts', 'roles', 'permissions'));
    }
}
