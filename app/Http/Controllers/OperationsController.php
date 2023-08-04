<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Operation;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function index()
    {
        $operations = Operation::latest()->get();
        return view('operations', compact('operations'));
    }

    public function store(Request $request, Article $article){ 

        $operation = new Operation();
        $operation->article_id = $article->id;
        $operation->user_id = Auth()->id();
        $operation->student_id = $request->input('student_id');
        $operation->save();
        
        return redirect()->route('articles.show', $article)->with('success','¡Préstamo registrado exitosamente!');
    }

    public function update(Operation $operation){
      
        $operation->active = false;
        $operation->save();

        return redirect()->back()->with('success','¡Artículo recibido exitosamente!');
    }
}
