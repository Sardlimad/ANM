<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'users';
    }
    public function create()
    {
        return view('user_create');
    }
    public function show($user)
    {
        
    }
}
