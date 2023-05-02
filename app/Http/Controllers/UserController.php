<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();

        return view('pages.user.view', compact('users'));
    }
    public function create()
    {
        $academies = Academy::all();

        return view('pages.user.create', compact('academies'));
    }
    public function show($user)
    {
        $user_info = User::select('name','username','avatar','rol','created_at')->where('username', $user)->first();

        return view('pages.user.profile', compact('user_info'));
    }
}
