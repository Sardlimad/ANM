<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class academyController extends Controller
{
    public function index()
    {
        return view('academy_view');
    }
    public function create()
    {
        return view('academy_create');
    }
    public function show($academy)
    {

    }
}
