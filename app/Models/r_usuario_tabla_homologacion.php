<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class r_usuario_tabla_homologacion extends Model
{
    use HasFactory;

    protected $table = 'r_usuario_tabla_homologacion';

    protected $fillable = [
        'usuario_id',
        'tabla_homologacion_id',
    ];
}
