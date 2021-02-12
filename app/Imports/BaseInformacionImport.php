<?php

namespace App\Imports;

use App\Models\ContenidoBaseInformacion;
use App\Models\r_base_contenido;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BaseInformacionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $rows = 0;
    

    public function __construct($baseInformacion_id)
    {
        $this->baseInformacion_id   = $baseInformacion_id;
    }

    public function model(array $row)
    {
        $this->rows++;

        $contenidobaseinformacion = new ContenidoBaseInformacion();
        $contenidobaseinformacion->llave_cruce          = $row['llave_cruce'];
        $contenidobaseinformacion->campo_informacion    = $row['campo_informacion'];
        $contenidobaseinformacion->save();


        $r_base_contenido = new r_base_contenido();
        $r_base_contenido->base_informacion_id  = $this->baseInformacion_id;
        $r_base_contenido->contenido_base_id    = $contenidobaseinformacion->id;
        $r_base_contenido->save();

    }
}
