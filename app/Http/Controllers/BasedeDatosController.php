<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\BaseInformacionImport;


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

        
        Excel::import(new BaseInformacionImport, $request->file);

        return view('BasedeDatos.import-form')->with('message', "Ok");

    }
}
