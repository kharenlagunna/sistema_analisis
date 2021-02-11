<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseInformacion extends Model
{
    use HasFactory;

    protected $table = 'base_informacion';

    protected $fillable = [
        'nombre_base',
        'descripcion_base',
        'sector_industri_base',
    ];
}
