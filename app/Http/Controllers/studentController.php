<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('student_view', compact('students'));
    }
    public function create()
    {
        return view('student_create');
    }
    public function show($student)
    {
        
    }
}
