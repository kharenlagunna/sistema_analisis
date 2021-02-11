<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\BaseInformacionImport;
use App\Models\BaseInformacion;


class BasedeDatosController extends Controller
{
  
    public function importForm(){

        $baseinformaciones = BaseInformacion::all();
        return view('BasedeDatos.import-form')->with('baseinformaciones', $baseinformaciones);
    }


    public function selectSearch(Request $request){

    	$baseinformacion = [];

        if($request->has('q')){
            $search = $request->q;
            $baseinformacion = BaseInformacion::select("id", "sector_industri_base")
            		->where('sector_industri_base', 'LIKE', "%$search%")
            		->get()->unique('sector_industri_base');
        }
        return response()->json($baseinformacion);
    }

    public function import(Request $request){

        $baseinformacion = new BaseInformacion();
        $baseinformacion->nombre_base = $request->get('nombre_base');
        $baseinformacion->descripcion_base = $request->get('descripcion_base');
        $baseinformacion->sector_industri_base = $request->get('sector_industri_base');
        $baseinformacion->save();
        
        Excel::import(new BaseInformacionImport, $request->file);

              
        $baseinformaciones = BaseInformacion::all();

        return view('BasedeDatos.import-form')->with('message', "Ok")->with('baseinformaciones', $baseinformaciones);

    }
}
