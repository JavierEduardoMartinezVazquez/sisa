<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_assistances;
use App\Exports\AssistancesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Helpers;
use Carbon\Carbon;

class AssistancesController extends Controller
{
    public function Assistances()
    {
        return view('control.paginas.assistances');
    }
    public function obtener_ultimo_id_assistances(){
        $ultimoNumeroTabla = C_assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function obtener_roles(){
        $roles = Role::all();
        $select_roles= "<option >Seleccionar...</option>";
        foreach($roles as $rol){
            $select_roles = $select_roles."<option value='".$rol->name."'>".$rol->name."</option>";
        }
        return response()->json($select_roles);
        
    }

   /* public function obtener_users(){
        $users = Usuario::all();
        $select_users= "<option >Seleccionar...</option>";
        foreach($users as $users){
            $select_users = $select_users."<option value='".$users->id."'>".$users->id."</option>";
        }
        return response()->json($select_users);
        
    }*/
    
    public function listar_assistances (Request $request)
    {
        if($request->ajax()){
            $data = C_assistances::select('id','Usuario','Fecha','Entrada','Salida','Observaciones','status');
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
        $assistances= C_assistances::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($assistances->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "assistances" => $assistances,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_assistances(Request $request){
        $assistances = C_assistances::where('id', $request->numero)->first();
        C_assistances::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> Usuario de la caja de texto
            'Usuario'=> $request->Usuario,
            'Fecha'=> $request->Fecha,
            'Entrada'=> $request->Entrada,
            'Salida'=> $request->Salida,
            'Observaciones'=> $request->Observaciones,
            
        ]);
        return response()->json($assistances);
    }
    public function verificar_baja_assistances(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $assistances = C_assistances::where('id', $numero)->first();
        return response()->json($assistances);
    }
    public function baja_assistances(Request $request){
        $assistances = C_assistances::where('id', $request->num)->first();
        C_assistances::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($assistances);
    }
    public function export_excel(Request $request){
        ini_set('max_execution_time', 300); // 5 minutos
        ini_set('memory_limit', '-1');
        $columns = ['Usuario','Fecha','Entrada','Salida','Observaciones','status'];
        return Excel::download(new AssistancesExport($columns), "Asistencias.xlsx");
    }

    public function obtener_fecha_actual_datetimelocal(Request $request){
        $fechas = Helpers::fecha_exacta_accion_dateinput();
        return response()->json($fechas);
    }

    //Leer codigo de barras
    public function leercodigo(Request $request){
        $buscarcodigo = $request->buscarcodigo;

        $exiteusuario = User::where('id', $buscarcodigo)->count();
        if($exiteusuario > 0){

            

            $exiteasistencia = C_assistances::where('Usuario', $buscarcodigo)->whereDate('Fecha', Carbon::now()->format("Y-m-d"))->count();

            if($exiteasistencia===0){
                $ultimoNumeroTabla = C_assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
                if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
                    $id = 1;
                }else{
                    $id = $ultimoNumeroTabla[0]->id+1;
                }  
                $assistances = new C_assistances;
                $assistances->Usuario=$buscarcodigo;
                $assistances->Fecha=Carbon::now()->format("Y-m-d");;
                $assistances->Entrada=Carbon::now()->format("H:i:s");
                $assistances->Observaciones='NINGUNA';
                
                $assistances->status='ALTA';        
                $assistances->save();
            }
            else{
                
                C_assistances::where('Usuario', $buscarcodigo)->where('Fecha', Carbon::now()->format("Y-m-d"))
                    ->update([
                        'Salida'=> Carbon::now()->format("H:i:s")
                    ]);
            }

        }
       
        return response()->json($buscarcodigo);
    }
    /*public function guardar_assistances(Request $request){
        $ultimoNumeroTabla = C_assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }   
        $assistances = new C_assistances;
        $assistances->Usuario=$request->Usuario;
        $assistances->Fecha=$request->Fecha;
        $assistances->Entrada=$request->Entrada;
        $assistances->Salida=$request->Salida;
        $assistances->Observaciones=$request->Observaciones;
        
        $assistances->status='ALTA';        
        $assistances->save();
        return response()->json($assistances);
    }*/
}

