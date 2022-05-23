<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function Permissions()
    {
        return view('control.paginas.permissions');
    }
}
