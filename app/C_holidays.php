<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_holidays extends Model
{
    public $timestamps = false;
    protected $table = 'holidays';
    protected $primarykey = 'id';
    protected $fillable = [
        'empleado',
        'solicitud',
        'departamento',
        'puesto',
        'inicio',
        'final',
        'disponibles',
        'status'
    ];
}
