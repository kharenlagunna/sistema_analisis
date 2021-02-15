<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\BaseInformacionImport;
use App\Models\BaseInformacion;
use App\Models\r_base_contenido;
use App\Models\r_usuario_base_informacion;


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

    public function import(Request $request)
    {

        $baseInformacion = new BaseInformacion();
        $baseInformacion->nombre_base           = $request->nombre_base;
        $baseInformacion->descripcion_base      = $request->descripcion_base;
        $baseInformacion->sector_industri_base  = $request->sector_industri_base;
        $baseInformacion->save();

        $r_usuario_base_informacion = new r_usuario_base_informacion();

        Excel::import(new BaseInformacionImport($baseInformacion->id), $request->file);
       
        $baseinformaciones = BaseInformacion::all();

        return view('BasedeDatos.import-form')->with('message', "Ok")->with('baseinformaciones', $baseinformaciones);

    }
}
