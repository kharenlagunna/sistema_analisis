<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenidoBaseInformacion extends Model
{
    use HasFactory;

    protected $table = 'contenido_base_informacion';

    protected $fillable = [
        'llave_cruce',
        'campo_informacion',
    ];
}
