<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_permissions;
use Illuminate\Http\Request;

class permissionsController extends Controller
{
    public function permissions()
    {
        return view('control.paginas.permissions');
    }
    public function obtener_ultimo_id_permissions(){
        $ultimoNumeroTabla = C_permissions::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_permissions(Request $request){
        $ultimoNumeroTabla = C_permissions::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }   
        $permissions = new C_permissions;
        $permissions->nombre=$request->nombre;
        $permissions->motivo=$request->motivo;
        $permissions->autorizacion=$request->autorizacion;
        $permissions->fecha=$request->fecha;
        
        $permissions->status='ALTA';        
        $permissions->save();
        return response()->json($permissions);
    }
    public function listar_permissions (Request $request)
    {
        if($request->ajax()){
            $data = C_permissions::select('id','nombre','motivo','fecha','autorizacion','status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerpermissions('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajapermissions('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_permissions(Request $request){
        $permissions= C_permissions::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($permissions->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "permissions" => $permissions,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_permissions(Request $request){
        $permissions = C_permissions::where('id', $request->numero)->first();
        C_permissions::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'nombre'=> $request->nombre,
            'motivo'=> $request->motivo,
            'fecha'=> $request->fecha,
            'autorizacion'=> $request->autorizacion
            
        ]);
        return response()->json($permissions);
    }
    public function verificar_baja_permissions(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $permissions = C_permissions::where('id', $numero)->first();
        return response()->json($permissions);
    }
    public function baja_permissions(Request $request){
        $permissions = C_permissions::where('id', $request->num)->first();
        C_permissions::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($permissions);
    }
}
