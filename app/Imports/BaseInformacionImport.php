<?php

namespace App\Imports;

use App\Models\ContenidoBaseInformacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BaseInformacionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        return new ContenidoBaseInformacion([           

            //
            'llave_cruce' => $row['llave_cruce'],
            'campo_informacion' => $row['campo_informacion'],
        ]);

      
    }
}
