<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade_id',
        'especialidade'
    ];


    public function cidade(){
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }
}
