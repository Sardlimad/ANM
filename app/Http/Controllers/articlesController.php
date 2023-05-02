<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\article;
use App\Models\Loan;
use App\Models\Operation;
use App\Models\Student;
use Illuminate\Http\Request;

class articlesController extends Controller
{
    public function index(){

        $articles = article::orderBy('id', 'desc')->get();

        return view('pages.article.view', compact('articles'));
    }
    
    public function create(){ 
        
        return view('pages.article.create');
    }

    public function store(Request $request){
                      
        $article = new article();

        $article->category = $request->category;
        $article->type = $request->type;
        $article->brand = $request->brand;
        $article->model = $request->model;
        $article->serial = $request->serial;
        $article->status = $request->status;
        $article->description = $request->description;

        $article->save();

        //Registrar Operacion
        $operation = new Operation();

        $operation->operation = 'Registro';
        $operation->id_article = $article->id;
        $operation->id_user = '1'; //Aqui debo sustituir por el usuario actual....

        $operation->save();

        return redirect()->route('articles.show', ['article'=> $article->id]);
    }

    public function show(article $article){

        $operations = Operation::Where('id_article', $article->id)->orderBy('id','desc')->get();
        $students = Student::all();
        $academies = Academy::all();

        return view('pages.article.show-edit', compact('article','operations','students','academies'));
    }

    // public function edit(article $article){
    //     return view('articles.edit', compact('article'));
    // }

    public function update(Request $request, article $article){
        
        $article->category = $request->category;
        $article->type = $request->type;
        $article->brand = $request->brand;
        $article->model = $request->model;
        $article->serial = $request->serial;
        $article->status = $request->status;
        $article->description = $request->description;

        $article->save();

        //Registrar Operacion
        $operation = new Operation();

        $operation->operation = 'Edición';
        $operation->id_article = $article->id;
        $operation->id_user = '1';

        $operation->save();

        return redirect()->route('articles.show', $article);
    }

    public function loan(Request $request){
        //Me quedo en elaborar el m'etodo loan para ejecutar el form de prestamos.
        $loan = new Loan();

        $loan->id_article = $request->id_article;
        $loan->id_student = $request->id_student;
        $loan->id_academy = $request->id_academy;

        $loan->save();
    }

    public function destroy(article $article){
        $article->delete();

        return redirect()->route('articles.index');
    }

    
}
