<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        return view('student_view');
    }
    public function create()
    {
        return view('student_create');
    }
    public function show($student)
    {
        
    }
}
