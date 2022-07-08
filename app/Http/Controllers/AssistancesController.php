<?php

namespace App\Http\Controllers;

use App\Assistances;
use App\C_business;
use App\C_hourhand;
use App\C_Roles;
use Carbon\Carbon;
Use Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Foundation\Auth\User;

class AsisstancesController extends Controller
{
    public function Asisstances()
    {
        return view('control.paginas.assistances');
    }
    public function obtener_ultimo_id_assistances(){
        $ultimoNumeroTabla = Assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
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
    public function guardar_assistances(Request $request){
        $email=$request->email;
        $ExisteUsuario = Assistances::where('email', $email)->first();
        if($ExisteUsuario == true){
            $assistances = 1;
	    }else{
            $ultimoNumeroTabla = Assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
            if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
                $id = 1;
            }else{
                $id = $ultimoNumeroTabla[0]->id+1;
        }
            $assistances = new Assistances;
            $assistances->name=$request->nombre;
            $assistances->lastname_p=$request->paterno;
            $assistances->lastname_m=$request->materno;
            $assistances->email=$request->email;
            $assistances->password=Hash::make($request->pass);
            $assistances->edad=$request->edad;
            $assistances->sucursal=$request->sucursal;
            $assistances->area=$request->area;
            $assistances->ingreso=$request->ingreso;
            $assistances->hentrada=$request->hentrada;
            $assistances->hsalida=$request->hsalida;
            $assistances->rol=$request->rol;

            /*$user->fechaingresocorp=$request->fecha_cor;
            $user->fechaingresoemp=$request->fecha_ini;
            $user->id_horario=$request->horario;
            $user->id_empresa=$request->empresa;
            $user->id_rol=$request->rol;*/
            $assistances->status="ALTA";
            $assistances->save();
        }
        return response()->json($assistances);

    }
    public function listar_assistances (Request $request)
    {
        if($request->ajax()){
            $data = Assistances::select('id', 
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
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerassistances('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajaassistances('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_assistances(Request $request){        
        $assistances= Assistances::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        $getroles = C_Roles::orderBy("id", "DESC")->get();
        $roles = "";
        $contador = 1;
        foreach($getroles as $getrol){
            if($getrol->id == $assistances->id_roles){
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
        if($assistances->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "assistances" => $assistances,
            "fechadeingresocorp" => Carbon::parse($assistances->fechaingresocorp)->format('Y-m-d')."T".Carbon::parse($assistances->fechaingresocorp)->format('H:i'),
            "fechadeingresoemp" => Carbon::parse($assistances->fechaingresoemp)->format('Y-m-d')."T".Carbon::parse($assistances->fechaingresoemp)->format('H:i'),
            "fechadebaja" => Helpers::formatoinputdatetime($assistances->fechabaja),
            "roles" => $roles,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_assistances(Request $request){
        $business = Assistances::where('id', $request->numero)->first();
        Assistances::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'nombre'=> $request->nombre
        ]);
        return response()->json($business);
    }
    public function verificar_baja_assistances(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $business = Assistances::where('id', $numero)->first();
        return response()->json($business);
    }
    public function baja_assistances(Request $request){
        $business = Assistances::where('id', $request->num)->first();
        Assistances::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($business);
    }
}
