<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Academy;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:students.index')->only('index', 'show');
        $this->middleware('can:students.create')->only('create','store');
        $this->middleware('can:students.update')->only('update');
        $this->middleware('can:students.destroy')->only('destroy');
    }

    public function index()
    {
        $students = Student::all();
        return view('pages.student.view', compact('students'));
    }
    
    public function create()
    {
        $academies = Academy::select('id','city')->get(); 
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
        $student->academy_id = $request->academy_id;

        $student->save();  //ASIGANACION MASIVA
        
        // Student::create($request);

        return redirect()->back()->with('success', '¡Registro creado exitosamente!');

    }

    public function show(Student $student)
    {
        $academies = Academy::select('id','city')->get();
        return view('pages.student.show', compact('student', 'academies'));
    }

    public function update(request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'academy_id' => 'required'
        ]);

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->birthday = $request->birthday;
        $student->type = $request->type;
        $student->academy_id = $request->academy_id;

        $student->save();  //ASIGANACION MASIVA Falta

        return redirect()->route('students.show', $student)->with('success', '¡Registro actualizado exitosamente!');

    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('success', '¡Registro eliminado exitosamente!');
    }
}
