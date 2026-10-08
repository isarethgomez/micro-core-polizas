<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;

    protected $table = 'polizas';

    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'tercero_id',
        'plan_id',
        'estatus',
    ];

    public function tercero()
    {
        return $this->belongsTo(Tercero::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}