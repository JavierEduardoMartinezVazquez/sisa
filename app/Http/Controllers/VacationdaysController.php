<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_vacationdays;

use Illuminate\Http\Request;

class VacationdaysController extends Controller
{
    public function Vacationdays()
    {
        return view('control.paginas.vacationdays');
    }
    public function obtener_ultimo_id_vacationdays(){
        $ultimoNumeroTabla = C_vacationdays::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_vacationdays(Request $request){
        $ultimoNumeroTabla = C_vacationdays::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $vacationdays = new C_vacationdays;
        $vacationdays->entrada=$request->entrada;
        $vacationdays->salida=$request->salida;
        $vacationdays->status='ALTA';        
        $vacationdays->save();
        return response()->json($vacationdays);
    }
    public function listar_vacationdays (Request $request)
    {
        if($request->ajax()){
            $data = C_vacationdays::select('id', 'entrada', 'salida', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenervacationdays('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajavacationdays('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_vacationdays(Request $request){
        $vacationdays= C_vacationdays::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($vacationdays->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "vacationdays" => $vacationdays,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_vacationdays(Request $request){
        $vacationdays = C_vacationdays::where('id', $request->numero)->first();
        C_vacationdays::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'entrada'=> $request->entrada,
            'salida'=> $request->salida
        ]);
        return response()->json($vacationdays);
    }
    public function verificar_baja_vacationdays(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $vacationdays = C_vacationdays::where('id', $numero)->first();
        return response()->json($vacationdays);
    }
    public function baja_vacationdays(Request $request){
        $vacationdays = C_vacationdays::where('id', $request->num)->first();
        C_vacationdays::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($vacationdays);
    }
}