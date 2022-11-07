<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class articlesController extends Controller
{
    public function index(){
        return view('article_view');
    }
    public function create(){
        return view('article_create');
    }
    public function show($article){

    }
}
