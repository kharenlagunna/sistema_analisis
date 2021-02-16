<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenidoTablaHomologacion extends Model
{
    use HasFactory;

    protected $table = 'contenido_tabla_homologacion';

    protected $fillable = [
        'grupo_categoria',
        'categoria_especifica',
    ];
}
