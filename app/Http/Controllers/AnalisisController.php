<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaseInformacion;
use App\Models\TablaHomologacion;
use Illuminate\Support\Facades\DB;

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
    

        $queryResult = DB::select('call sis_analisis.categoriza(?,?)',[$request->nombre_base,$request->tabla_homologacion]);

        $result = collect($queryResult);
        dd($result);    

        return view('Analisis.index');

    }
}
