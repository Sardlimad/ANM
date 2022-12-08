<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Http\Request;

class academyController extends Controller
{
    public function index()
    {
        $academies = Academy::all();

        $users = User::all();

        return view('academy_view', compact('academies'), compact('users'));
    }
    public function create()
    {
        return view('academy_create');
    }
    public function show($academy)
    {

    }
}
