<?php

namespace App\Imports;

use App\Models\ContenidoTablaHomologacion;
use App\Models\r_tabla_contenido;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TablaHomologacionImport implements  ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $rows = 0;
    

    public function __construct($tabla_homologacion_id)
    {
        $this->tabla_homologacion_id   = $tabla_homologacion_id;
    }

    public function model(array $row)
    {
        $this->rows++;

        $contenido_tabla_homologacion = new ContenidoTablaHomologacion();
        $contenido_tabla_homologacion->grupo_categoria          = $row['grupo_categoria'];
        $contenido_tabla_homologacion->categoria_especifica     = $row['categoria_especifica'];
        $contenido_tabla_homologacion->save();


        $r_tabla_contenido = new r_tabla_contenido();
        $r_tabla_contenido->tabla_homologacion_id  = $this->tabla_homologacion_id;
        $r_tabla_contenido->contenido_tabla_id     = $contenido_tabla_homologacion->id;
        $r_tabla_contenido->save();

    }
}
