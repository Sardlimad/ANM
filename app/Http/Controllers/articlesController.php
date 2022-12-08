<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class articlesController extends Controller
{
    public function index(){

        $articles = article::all();

        return view('article_view', compact('articles'));
    }
    
    public function create(){ 
        return view('article_create');
    }

    public function store(article $article){

    }

    public function show(article $article){
        return view('articles.show', compact('article'));
    }

    public function edit(article $article){
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, article $article){
        
        $article->update($request->all());

        return redirect()->route('article.show', $article);
    }

    public function destroy(article $article){
        
    }

    
}
