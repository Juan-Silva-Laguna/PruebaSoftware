<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Tercero;
Use Log;

class TerceroController extends Controller
{
    public function getAll(){
        
        $data = Tercero::join('elementos_listas AS tipo_identificacion', 'tipo_identificacion.id', '=', 'terceros.tipo_identificacion_id')
        ->join('elementos_listas AS tipo_tercero', 'tipo_tercero.id', '=', 'terceros.tipo_tercero_id')
        ->join('elementos_listas AS departamento', 'departamento.id', '=', 'terceros.departamento_id')
        ->join('elementos_listas AS ciudad', 'ciudad.id', '=', 'terceros.idmunicipio_id')
        ->join('elementos_listas AS tipo_contribuyente', 'tipo_contribuyente.id', '=', 'terceros.tipo_contribuyente_id')
        ->select('terceros.id','terceros.nombre1','terceros.nombre2','tipo_identificacion.nombre AS tipo_identificacion', 'terceros.numero_identificacion'
        ,'departamento.nombre AS departamento','ciudad.nombre AS ciudad','tipo_tercero.nombre AS tipo_tercero')
        ->get();
        return response()->json($data, 200);
      }
  
      public function create(Request $request){
        $data['tipo_identificacion_id'] = $request['tipo_identificacion_id'];
        $data['numero_identificacion'] = $request['numero_identificacion'];
        $data['nombre1'] = $request['nombre1'];
        $data['nombre2'] = $request['nombre2'];
        $data['apellido1'] = $request['apellido1'];
        $data['apellido2'] = $request['apellido2'];
        $data['idmunicipio_id'] = $request['idmunicipio_id'];
        $data['tipo_contribuyente_id'] = $request['tipo_contribuyente_id'];
        $data['tipo_tercero_id'] = $request['tipo_tercero_id'];
        $data['departamento_id'] = $request['departamento_id'];
        Tercero::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
      }
  
      public function delete($id){
        $res = Tercero::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }
  
      public function get($id){
        $data = Tercero::find($id);
        $data = Tercero::join('elementos_listas AS tipo_identificacion', 'tipo_identificacion.id', '=', 'terceros.tipo_identificacion_id')
        ->join('elementos_listas AS tipo_tercero', 'tipo_tercero.id', '=', 'terceros.tipo_tercero_id')
        ->join('elementos_listas AS departamento', 'departamento.id', '=', 'terceros.departamento_id')
        ->join('elementos_listas AS ciudad', 'ciudad.id', '=', 'terceros.idmunicipio_id')
        ->join('elementos_listas AS tipo_contribuyente', 'tipo_contribuyente.id', '=', 'terceros.tipo_contribuyente_id')
        ->select('terceros.*')->where('terceros.id',$id)
        ->get();
        return response()->json($data, 200);
      }
  
      public function update(Request $request,$id){
        $data['tipo_identificacion_id'] = $request['tipo_identificacion_id'];
        $data['numero_identificacion'] = $request['numero_identificacion'];
        $data['nombre1'] = $request['nombre1'];
        $data['nombre2'] = $request['nombre2'];
        $data['apellido1'] = $request['apellido1'];
        $data['apellido2'] = $request['apellido2'];
        $data['idmunicipio_id'] = $request['idmunicipio_id'];
        $data['tipo_contribuyente_id'] = $request['tipo_contribuyente_id'];
        $data['tipo_tercero_id'] = $request['tipo_tercero_id'];
        $data['departamento_id'] = $request['departamento_id'];
        Tercero::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      }
}
