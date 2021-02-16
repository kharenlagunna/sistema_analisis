<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class r_tabla_contenido extends Model
{
    use HasFactory;

    protected $table = 'r_tabla_contenido';

    protected $fillable = [
        'tabla_homologacion_id',
        'contenido_tabla_id',
    ];
}
