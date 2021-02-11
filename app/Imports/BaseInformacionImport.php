<?php

namespace App\Imports;

use App\Models\BaseInformacion;
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
        return new BaseInformacion([
            //
            'nombre_base' => $row['nombre_base'],
            'descripcion_base' => $row['descripcion_base'],
            'sector_industri_base' => $row['sector_industri_base'],
        ]);
    }
}
