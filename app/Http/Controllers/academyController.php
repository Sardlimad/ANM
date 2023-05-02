<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\User;
use App\Models\Student;
use\App\Models\article;
use Illuminate\Http\Request;

class academyController extends Controller
{
    public function index()
    {
        $academies = Academy::all();

        $users = User::all();

        // $academies = Student::withCount(['academia'])->get();

             
        return view('pages.academy.view', compact('academies'),  compact('users'));
    }
    public function create()
    {
        $managers = User::where('rol', 'Representante')->get();
       
        return view('pages.academy.create', compact('managers'));
    }
    public function show($academy)
    {

    }
}
