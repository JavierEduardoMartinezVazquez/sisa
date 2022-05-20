<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_Roles extends Model
{
    public $timestamps = false;
    protected $table = 'roles';
    protected $primarykey = 'id';
    protected $fillable = [
        'tipo'
    ];
}
