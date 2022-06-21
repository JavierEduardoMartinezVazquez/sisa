<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_permissions extends Model
{
    public $timestamps = false;
    protected $table = 'permissions';
    protected $primarykey = 'id';
    protected $fillable = [
        'nombre',
        'motivo',
        'fecha',
        'autorizacion',
        'status'
        
    ];
}
 