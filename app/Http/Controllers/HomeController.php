<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\article;
use App\Models\Operation;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $articles_total = article::all();
        $articles_store = article::where('available', '1')->get();
        $articles_prest = article::where('available', '0')->get();
        $academies = Academy::all();
        $students_total = Student::all();
        $students_auto = Student::where('type', 'Autodidacta')->get();

        $echart_registros = Operation::select('operation')->where('operation', 'Registro')->get();
        $echart_prestamos = Operation::select('operation')->where('operation', 'Préstamo')->get();
        $echart_devolucion = Operation::select('operation')->where('operation', 'Devolución')->get();
        $echart_eliminacion = Operation::select('operation')->where('operation', 'Eliminación')->get();
        $echart_edicion = Operation::select('operation')->where('operation', 'Edición')->get();

        $last_operations = Operation::select('operation', 'id_article', 'created_at')->latest()->take(15)->get();

        return view(
            'dashboard',
            compact(
                'articles_total',
                'articles_prest',
                'articles_store',
                'academies',
                'students_total',
                'students_auto',
                'echart_registros',
                'echart_prestamos',
                'echart_devolucion',
                'echart_eliminacion',
                'echart_edicion',
                'last_operations',
            )
        );
    }
}
