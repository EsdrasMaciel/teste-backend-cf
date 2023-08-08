<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    public function create(Request $request)
    {
        $rules=array(
            "nome" => 'required',
            "cpf" => 'required',
            "celular" => 'required',
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
            'cpf'=>$request->cpf,
            'celular'=>$request->celular,
          ];

          $paciente= Paciente::create(
            $data
          );

          $paciente = Paciente::where('id',$paciente->id)->select('*')->get()->first();

          return response()->json(
            $paciente,
          200);
    }

    public function update(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $rules=array(
            "id" => 'required|exists:pacientes,id',
            "nome" => 'required',
            "celular" => 'required'
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json([
                'message' =>  $validator->errors()
            ], 400);
        }

        $paciente = Paciente::find($id);
        $paciente->nome = $request->nome;
        $paciente->celular = $request->celular;
        $paciente->save();

        return response()->json(
            $paciente,
        200);
    }
}
