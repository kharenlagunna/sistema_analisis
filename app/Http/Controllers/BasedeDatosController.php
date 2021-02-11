<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\BaseInformacionImport;
use App\Models\BaseInformacion;


class BasedeDatosController extends Controller
{
    //

   /*  public function index()
    {
        return view('BasedeDatos.index');
    } */

    public function importForm(){

        return view('BasedeDatos.import-form');
    }


    public function selectSearch(Request $request)
    {
    	$baseinformacion = [];

        if($request->has('q')){
            $search = $request->q;
            $baseinformacion = BaseInformacion::select("id", "sector_industri_base")
            		->where('sector_industri_base', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($baseinformacion);
    }

    public function import(Request $request){

       // dd($request);

        $baseinformacion = new BaseInformacion();
        $baseinformacion->nombre_base = $request->get('nombre_base');
        $baseinformacion->descripcion_base = $request->get('descripcion_base');
        $baseinformacion->sector_industri_base = $request->get('sector_industri_base');
        $baseinformacion->save();
        
        Excel::import(new BaseInformacionImport, $request->file);

        return view('BasedeDatos.import-form')->with('message', "Ok");

    }
}
