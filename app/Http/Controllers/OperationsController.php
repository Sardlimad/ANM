<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function __invoke()
    {
        $operations = Operation::orderBy('id', 'desc')->get();

        return view('operations', compact('operations'));
    }
}
