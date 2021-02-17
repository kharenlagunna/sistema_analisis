<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaseInformacion;
use App\Models\TablaHomologacion;
class AnalisisController extends Controller
{
    //

    public function index()
    {

        $BaseInformacion = BaseInformacion::all();
        $TablaHomologacion = TablaHomologacion::all();
        return view('Analisis.index')->with('BaseInformacion', $BaseInformacion)
                                     ->with('TablaHomologacion', $TablaHomologacion);
    }

    public function analisis(Request $request){

        return view('Analisis.index');

    }
}
