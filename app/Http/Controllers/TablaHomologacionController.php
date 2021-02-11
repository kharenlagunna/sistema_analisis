<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablaHomologacionController extends Controller
{
    //

    public function importForm(){

        return view('TablaHomologacion.import-form');
    }
}
