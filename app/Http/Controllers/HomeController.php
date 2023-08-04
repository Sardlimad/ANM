<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Article;
use App\Models\Operation;
use App\Models\Student;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['can:dashboard']);
        
    }

    public function __invoke()
    {

        $articles = article::all();
        $academies = Academy::all();
        $students = Student::all();

        $operations = Operation::all();
        $last_operations = Operation::select('article_id','updated_at', 'active')->latest('updated_at')->take(10)->get();

        return view(
            'dashboard',
            compact(
                'articles',
                'academies',
                'students',
                'operations',
                'last_operations',
            )
        );
    }
}
