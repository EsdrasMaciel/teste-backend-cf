<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CidadeController extends Controller
{
    function listar(Request $request){
        
        $cidades = Cidade::all()->makeHidden([
            'updated_at',
            'created_at',
            'deleted_at'
          ]);
          
        return response()->json(
           $cidades,
         200);
    }

    function listarMedicos(Request $request, $id){
      $request->merge(['id' => $id]);
      $rules=array(
          "id" => 'required|exists:cidades,id',
      );
      $validator=Validator::make($request->all(),$rules);
      if($validator->fails())
      {
          return response()->json([
              'message' =>  $validator->errors()
          ], 400);
      }
      $medicos = Medico::where('cidade_id', $id)->get()->medicos
        ->makeHidden([
            'updated_at',
            'created_at',
            'deleted_at'
        ]);
        
      return response()->json(
         $medicos,
       200);
  }

}
