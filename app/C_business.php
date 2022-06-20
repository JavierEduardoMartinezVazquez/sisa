<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_business extends Model
{
    public $timestamps = false;
    protected $table = 'business';
    protected $primarykey = 'id';
    protected $fillable = [
        'empresa',
        'direccion',
        'numero',
        'status'
        
    ];
}
 