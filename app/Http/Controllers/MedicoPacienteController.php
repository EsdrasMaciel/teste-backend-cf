<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MedicoPacienteController extends Controller
{

    public function listar(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $rules=array(
            "id" => 'required|exists:medicos,id',
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json([
                'message' =>  $validator->errors()
            ], 400);
        }
      
      $pacientes = DB::table('medicos')
      ->join('medicos_pacientes', 'medicos.id', '=', 'medicos_pacientes.medico_id')
      ->join('pacientes', 'pacientes.id', '=', 'medicos_pacientes.paciente_id')
      ->select('pacientes.*')
      ->where('medicos.id',$id)
      ->get();
          
        return response()->json(
           $pacientes,
         200);
    }

    
    function create(Request $request, $id) {

        $rules=array(
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id'
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json([
                'message' =>  $validator->errors()
            ], 400);
        }

        $data = [
            'paciente_id'=>$request->paciente_id,
            'medico_id'=>$request->medico_id
          ];
    
        $medicoPaciente= MedicoPaciente::create(
            $data
        );
        $medico = Medico::find($request->medico_id);
        $paciente = Paciente::find($request->paciente_id);

        $data = [
            'medico'=>$medico,
            'paciente'=>$paciente,
        ];
        return response()->json(
            $data,
        200);
    }
}
