<?php

namespace App\Http\Controllers;

use App\C_business;
use App\C_hourhand;
use App\C_Roles;
use Carbon\Carbon;
Use Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function User()
    {
        return view('control.paginas.user');
    }
    public function obtener_ultimo_id_user(){
        $ultimoNumeroTabla = User::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }

    public function obtener_empresa(Request $request){
        if($request->ajax()){
            $data = C_business::where('status', 'ALTA')->orderBy("id", "ASC")->get();
            return DataTables::of($data)
                ->addColumn('operaciones', function($data){
                    $boton = '<div class="btn bg-green btn-xs waves-effect" onclick="seleccionarempresa('.$data->nombre.',\')">Seleccionar</div>';
                    return $boton;
                })
                ->rawColumns(['operaciones'])
                ->make(true);
        }
    }
    public function obtener_horario(Request $request){
        if($request->ajax()){
            $data = C_hourhand::where('status', 'ALTA')->orderBy("id", "ASC")->get();
            return DataTables::of($data)
                ->addColumn('operaciones', function($data){
                    $boton = '<div class="btn bg-green btn-xs waves-effect" onclick="seleccionarhorario('.$data->id.',\')">Seleccionar</div>';
                    return $boton;
                })
                ->rawColumns(['operaciones'])
                ->make(true);
        }
    }
    public function obtener_roles(){
        $getroles = C_Roles::orderBy("id", "DESC")->get();
        $roles = "";
        $contador = 1;        
            foreach($getroles as $getrol){
            $roles = $roles.
            '<div class="col-md">'.
                '<input class="form-check-input" type="radio" name="rol" id="rol'.$contador.'" value="'.$getrol->id.'" required></input>'.
                '<label for="rol'.$contador.'">'.$getrol->tipo.'</label>'.
            '</div>';
            $contador++;
        }
        return response()->json($roles);
    }
    public function guardar_user(Request $request){
        $email=$request->email;
        $ExisteUsuario = User::where('email', $email)->first();
        if($ExisteUsuario == true){
            $user = 1;
	    }else{
            $ultimoNumeroTabla = User::select("id")->orderBy("id", "DESC")->take(1)->get();
            if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
                $id = 1;
            }else{
                $id = $ultimoNumeroTabla[0]->id+1;
        }
            $user = new User;
            $user->name=$request->nombre;
            $user->lastname_p=$request->paterno;
            $user->lastname_m=$request->materno;
            $user->email=$request->email;
            $user->password=Hash::make($request->pass);
            $user->edad=$request->edad;
            $user->sucursal=$request->sucursal;
            $user->area=$request->area;
            $user->ingreso=$request->ingreso;
            $user->hentrada=$request->hentrada;
            $user->hsalida=$request->hsalida;
            $user->rol=$request->rol;
            /*$user->fechaingresocorp=$request->fecha_cor;
            $user->fechaingresoemp=$request->fecha_ini;
            $user->id_horario=$request->horario;
            $user->id_empresa=$request->empresa;
            $user->id_rol=$request->rol;*/
            $user->status="ALTA";
            $user->save();
        }
        return response()->json($user);

    }
    public function listar_user (Request $request)
    {
        if($request->ajax()){
            $data = User::select('id', 
            'name',
            'lastname_p',
            'lastname_m',
            'email',
            'edad',
            'sucursal',
            'area',
            'ingreso',
            'hentrada',
            'hsalida',
            'rol',
            /*'fechaingresocorp',
            'fechaingresoemp',
            'fechabaja',
            'id_horario',
            'id_empresa',
            'id_area',
            'id_rol',*/
            'status'
        );
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obteneruser('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajauser('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_user(Request $request){        
        $user= User::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        $getroles = C_Roles::orderBy("id", "DESC")->get();
        $roles = "";
        $contador = 1;
        foreach($getroles as $getrol){
            if($getrol->id == $user->id_roles){
                $roles = $roles.
                '<div class="col-md">'.
                    '<input class="form-check-input" type="radio" name="rol" id="rol'.$contador.'" value="'.$getrol->id.'" required checked></input>'.
                    '<label for="rol'.$contador.'">'.$getrol->tipo.'</label>'.
                '</div>';
            }else{
                $roles = $roles.
                '<div class="col-md">'.
                    '<input class="form-check-input" type="radio" name="rol" id="rol'.$contador.'" value="'.$getrol->id.'" required></input>'.
                    '<label for="rol'.$contador.'">'.$getrol->tipo.'</label>'.
                '</div>';
            }
            $contador++;        
        }        
        if($user->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "user" => $user,
            "fechadeingresocorp" => Carbon::parse($user->fechaingresocorp)->format('Y-m-d')."T".Carbon::parse($user->fechaingresocorp)->format('H:i'),
            "fechadeingresoemp" => Carbon::parse($user->fechaingresoemp)->format('Y-m-d')."T".Carbon::parse($user->fechaingresoemp)->format('H:i'),
            "fechadebaja" => Helpers::formatoinputdatetime($user->fechabaja),
            "roles" => $roles,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_user(Request $request){
        $user = User::where('id', $request->numero)->first();
        User::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'nombre'=> $request->nombre
        ]);
        return response()->json($user);
    }
    public function verificar_baja_user(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $user = User::where('id', $numero)->first();
        return response()->json($user);
    }
    public function baja_user(Request $request){
        $user = User::where('id', $request->num)->first();
        User::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($user);
    }
}
