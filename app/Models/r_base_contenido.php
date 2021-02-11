<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class r_base_contenido extends Model
{
    use HasFactory;

    protected $table = 'r_base_contenido';

    protected $fillable = [
        'base_informacion_id',
        'contenido_base_id',
    ];

}
