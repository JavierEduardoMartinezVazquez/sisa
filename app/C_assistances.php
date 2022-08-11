<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_assistances extends Model
{
    public $timestamps = false;
    protected $table = 'assistances';
    protected $primarykey = 'id';
    protected $fillable = [
        'Usuario',
        'Fecha',
        'Entrada',
        'Salida',
        'status'
        
    ];
}
