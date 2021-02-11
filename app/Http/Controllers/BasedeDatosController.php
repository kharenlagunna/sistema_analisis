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

    public function import(Request $request){

        $baseinformacion = new BaseInformacion();
        $baseinformacion->nombre_base = $request->get('nombre_base');
        $baseinformacion->descripcion_base = $request->get('descripcion_base');
        $baseinformacion->sector_industri_base = $request->get('sector_industri_base');
        $baseinformacion->save();
        
        Excel::import(new BaseInformacionImport, $request->file);

        return view('BasedeDatos.import-form')->with('message', "Ok");

    }
}
