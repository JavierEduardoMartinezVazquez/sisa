<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_assistances;
use Illuminate\Http\Request;

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
    public function guardar_assistances(Request $request){
        $ultimoNumeroTabla = C_assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $assistances = new C_assistances;
        $assistances->empresa=$request->empresa;
        $assistances->direccion=$request->direccion;
        $assistances->numero=$request->numero;
        $assistances->status='ALTA';        
        $assistances->save();
        return response()->json($assistances);
    }
    public function listar_assistances (Request $request)
    {
        if($request->ajax()){
            $data = C_assistances::select('id','empresa','direccion','numero','status');
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
            //atributo de la Base => $request-> nombre de la caja de texto
            'empresa'=> $request->empresa,
            'direccion'=> $request->direccion,
            'numero'=> $request->numero
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
}
