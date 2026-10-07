<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    use HasFactory;

    protected $table = 'terceros';

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'direccion',
        'estatus',
    ];
}