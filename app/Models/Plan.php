<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes';

    protected $fillable = [
        'nombre',
        'suma_asegurada',
        'costo_mensual',
        'estatus',
    ];

    public function polizas()
    {
        return $this->hasMany(Poliza::class);
    }
}