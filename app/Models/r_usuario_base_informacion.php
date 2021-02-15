<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class r_usuario_base_informacion extends Model
{
    use HasFactory;

    protected $table = 'r_usuario_base_informacion';

    protected $fillable = [
        'usuario_id',
        'base_informacion_id',
    ];
}
