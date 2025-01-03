<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
Use App\Models\ElementosListas;
Use Log;

class ElementosListasController extends Controller
{
    public function getTipoIdentificacion(){
        $data = ElementosListas::join('tipos_listas', 'tipos_listas.id', '=', 'elementos_listas.tipos_listas_id')
        ->select('elementos_listas.id','elementos_listas.nombre')
        ->where('tipos_listas.nombre', '=', 'tipo_identificacion')
        ->get();        
        return response()->json($data, 200);
    }

    public function getTipoTercero(){
        $data = ElementosListas::join('tipos_listas', 'tipos_listas.id', '=', 'elementos_listas.tipos_listas_id')
        ->select('elementos_listas.id','elementos_listas.nombre')
        ->where('tipos_listas.nombre', '=', 'tipo_tercero')
        ->get();        
        return response()->json($data, 200);
    }

    public function getDepartamento(){
        $data = ElementosListas::join('tipos_listas', 'tipos_listas.id', '=', 'elementos_listas.tipos_listas_id')
        ->select('elementos_listas.id','elementos_listas.nombre')
        ->where('tipos_listas.nombre', '=', 'departamento')
        ->get();        
        return response()->json($data, 200);
    }

    public function getCiudad(){
        $data = ElementosListas::join('tipos_listas', 'tipos_listas.id', '=', 'elementos_listas.tipos_listas_id')
        ->select('elementos_listas.id','elementos_listas.nombre')
        ->where('tipos_listas.nombre', '=', 'ciudad')
        ->get();        
        return response()->json($data, 200);
    }

    public function getTipoContribuyente(){
        $data = ElementosListas::join('tipos_listas', 'tipos_listas.id', '=', 'elementos_listas.tipos_listas_id')
        ->select('elementos_listas.id','elementos_listas.nombre')
        ->where('tipos_listas.nombre', '=', 'tipo_contribuyente')
        ->get();        
        return response()->json($data, 200);
    }
}
