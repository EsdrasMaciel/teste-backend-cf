<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MedicoController extends Controller
{
    public function listar(Request $request)
    {
        $medicos = Medico::all()->makeHidden([
            'updated_at',
            'created_at',
            'deleted_at'
          ]);
          
        return response()->json(
           $medicos,
         200);
    }

    public function create(Request $request)
    {

      $rules=array(
        "nome" => ['required'],
        "especialidade" => ['required'],
        "cidade_id" => 'required|exists:cidades,id',
      );

      $validator=Validator::make($request->all(),$rules);
      if($validator->fails())
      {
          return response()->json([
              'message' =>  $validator->errors()
          ], 400);
      }

      $data = [
        'nome'=>$request->nome,
        'especialidade'=>$request->especialidade,
        'cidade_id'=>$request->cidade_id,
      ];

      $medico= Medico::create(
        $data
      );

      $medico = Medico::where('id',$medico->id)->get()->first();
          
      return response()->json(
          $medico,
        200);
    }


}
