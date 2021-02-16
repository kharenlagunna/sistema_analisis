<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablaHomologacion;
use App\Models\r_tabla_contenido;
use App\Imports\TablaHomologacionImport;
use Excel;

class TablaHomologacionController extends Controller
{
    //

    public function importForm(){

        $TablaHomologaciones = TablaHomologacion::all();
        return view('TablaHomologacion.import-form')->with('TablaHomologaciones', $TablaHomologaciones);
    }

    public function selectSearch(Request $request){

    	$TablaHomologacion_sector = [];

        if($request->has('q')){
            $search = $request->q;
            $TablaHomologacion_sector = TablaHomologacion::select("id", "sector_industria_tabla")
            		->where('sector_industria_tabla', 'LIKE', "%$search%")
            		->get()->unique('sector_industria_tabla');
        }
        return response()->json($TablaHomologacion_sector);
    }

    public function import(Request $request)
    {

        $TablaHomologacion = new TablaHomologacion();
        $TablaHomologacion->nombre_tabla            = $request->nombre_tabla;
        $TablaHomologacion->descripcion_tabla       = $request->descripcion_tabla;
        $TablaHomologacion->sector_industria_tabla  = $request->sector_industria_tabla;
        $TablaHomologacion->save();

       /*  $r_usuario_base_informacion = new r_usuario_base_informacion();

        dd($request->session()->all()); */

        Excel::import(new TablaHomologacionImport($TablaHomologacion->id), $request->file);

        $TablaHomologaciones = TablaHomologacion::all();
        return view('TablaHomologacion.import-form')->with('TablaHomologaciones', $TablaHomologaciones);
       
    }
}
