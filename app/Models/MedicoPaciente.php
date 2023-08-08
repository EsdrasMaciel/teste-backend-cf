<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoPaciente extends Model
{
    protected $table = 'medicos_pacientes';
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'paciente_id'
    ];

    public function medico(){
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
