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
    // Intenta encontrar un usuario con el mismo correo electrónico
    $existingUser = User::where('email', $request->email)->first();

    // Si el usuario ya existe, redirige con un mensaje de error
    if ($existingUser) {
        return redirect()->back()->withError('El correo electrónico ya está en uso.');
    }

    // Si no existe, crea el nuevo usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Asigna roles al usuario
    $user->roles()->sync($request->roles);

    // Redirige con un mensaje de éxito
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
