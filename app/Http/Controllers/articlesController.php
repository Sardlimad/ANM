<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Article;
use App\Models\Loan;
use App\Models\Operation;
use App\Models\Student;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:articles.index')->only('index', 'show');
        $this->middleware('can:articles.create')->only('create','store');
        $this->middleware('can:articles.update')->only('update');
        $this->middleware('can:articles.destroy')->only('destroy');
    }

    public function index(){
        $articles = article::latest()->get();
        return view('pages.article.view', compact('articles'));
    }
    
    public function create(){
        return view('pages.article.create');
    }

    public function store(Request $request){
        //Registrar Articulo
        article::create($request->all());
        
        return redirect()->back()->with('success','¡Registro creado exitosamente!');
    }

    public function show(article $article){
        $students = Student::orderBy('name', 'asc')->get();
        return view('pages.article.show-edit', compact('article','students'));
    }

    // public function edit(article $article){
    //     return view('articles.edit', compact('article'));
    // }

    public function update(Request $request, article $article){

        $this->validate($request, [
            'category' => 'required',
            'type' => 'required',
            'brand' => 'required',
            'serial' => 'required'
        ]);
        
        $article->category = $request->category;
        $article->type = $request->type;
        $article->brand = $request->brand;
        $article->model = $request->model;
        $article->serial = $request->serial;
        $article->status = $request->status;
        $article->description = $request->description;
        $article->save();

        return redirect()->route('articles.show', $article)->with('success','¡Registro actualizado exitosamente!');
    }
    
    public function destroy(article $article){
        $article->delete();
        return redirect()->route('articles.index')->with('success','¡Registro eliminado exitosamente!');
    }
    
}
