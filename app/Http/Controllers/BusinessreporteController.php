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
    
}
