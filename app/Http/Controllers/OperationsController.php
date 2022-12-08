<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function __invoke()
    {
        $operations = Operation::all();

        return view('operations', compact('operations'));
    }
}
