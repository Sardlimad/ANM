<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Academy;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('pages.student.view', compact('students'));
    }
    public function create()
    {
        $academies = Academy::all(); //Seria optimo solo pidiendo el id y el nombre
        return view('pages.student.create', compact('academies'));
    }

    public function store(request $request)
    {
        $student = New Student();

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->birthday = $request->birthday;
        $student->type = $request->type;
        $student->id_academy = $request->id_academy;

        $student->save();

        return redirect()->route('dashboard');

    }


    public function show($student)
    {
        
    }
}
