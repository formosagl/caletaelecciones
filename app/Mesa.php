<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'tipo', 'nombre', 'cargo1', 'candidato1', 'cargo2', 'candidato2', 'logo', 'imagen', 'votos', 'porcentaje', 'color'
    ];

    protected $primaryKey = 'mesas_id';    
    protected $table = 'mesas';
}
