<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:academy.index')->only('index', 'show');
        $this->middleware('can:academy.create')->only('create','store');
        $this->middleware('can:academy.update')->only('update');
        $this->middleware('can:academy.destroy')->only('destroy');
    }

    public function index()
    {
        $academies = Academy::all();
        $users = User::all();
             
        return view('pages.academy.view', compact('academies'),  compact('users'));
    }
    
    public function create()
    {              
        return view('pages.academy.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'city' => 'bail|required|unique:academies',
        ]);
        
        Academy::create($request->all());

        return redirect()->back()->with('success', '¡Registro creado exitosamente!');
    }

    public function show(Academy $academy)
    {
        return view('pages.academy.show', compact('academy'));
    }

    public function update(Request $request, Academy $academy){
        
        $academy->update($request->all());

        return redirect()->route('academy.index')->with('success', '¡Academia actualizada exitosamente!');
    }

    public function destroy(Academy $academy){

        $academy->delete();

        return redirect()->route('academy.index')->with('success', '¡Academia eliminada exitosamente!');
    }
}
