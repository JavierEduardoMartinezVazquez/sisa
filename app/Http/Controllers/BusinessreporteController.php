<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_businessreporte;
use Illuminate\Http\Request;

class BusinessreporteController extends Controller
{
    public function Businessreporte()
    {
        return view('control.paginas.businessreporte');
    }
    public function obtener_ultimo_id_businessreporte(){
        $ultimoNumeroTabla = C_businessreporte::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_businessreporte(Request $request){
        $ultimoNumeroTabla = C_businessreporte::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $businessreporte = new C_businessreporte;
        $businessreporte->empresa=$request->empresa;
        $businessreporte->direccion=$request->direccion;
        $businessreporte->numero=$request->numero;
        $businessreporte->status='ALTA';        
        $businessreporte->save();
        return response()->json($businessreporte);
    }
    public function listar_businessreporte (Request $request)
    {
        if($request->ajax()){
            $data = C_businessreporte::select('id','empresa','direccion','numero','status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerbusinessreporte('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajabusinessreporte('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_businessreporte(Request $request){
        $businessreporte= C_businessreporte::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($businessreporte->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "businessreporte" => $businessreporte,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_businessreporte(Request $request){
        $businessreporte = C_businessreporte::where('id', $request->numero)->first();
        C_businessreporte::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'empresa'=> $request->empresa,
            'direccion'=> $request->direccion,
            'numero'=> $request->numero
        ]);
        return response()->json($businessreporte);
    }
    public function verificar_baja_businessreporte(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $businessreporte = C_businessreporte::where('id', $numero)->first();
        return response()->json($businessreporte);
    }
    public function baja_businessreporte(Request $request){
        $businessreporte = C_businessreporte::where('id', $request->num)->first();
        C_businessreporte::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($businessreporte);
    }
}
