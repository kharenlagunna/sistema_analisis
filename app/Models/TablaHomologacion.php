<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaHomologacion extends Model
{
    use HasFactory;

    
    protected $table = 'tabla_homologacion';

    protected $fillable = [
        'nombre_tabla',
        'descripcion_tabla',
        'sector_industria_tabla',
    ];
}
