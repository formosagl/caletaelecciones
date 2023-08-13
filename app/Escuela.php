<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'escuelas_nombre', 'escuelas_desde', 'escuelas_hasta'
    ];

    protected $primaryKey = 'escuelas_id';
    protected $table = 'escuelas';
}
