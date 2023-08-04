<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\IsEmpty;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user.index')->only('index', 'show');
        $this->middleware('can:user.create')->only('create', 'store');
        $this->middleware('can:user.update')->only('update');
        $this->middleware('can:user.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::all();

        return view('pages.user.view', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('pages.user.create', compact('roles'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('pages.user.show', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('user.index')->with('success', '¡Usuario registrado exitosamente!');
    }

    public function update(Request $request,User $user)
    {
        $user->update($request->all());

        $user->roles()->sync($request->roles);

        return redirect()->route('user.show', $user)->with('success', '¡Usuario actualizado exitosamente!');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', '¡Usuario eliminado exitosamente!');

    }
}
