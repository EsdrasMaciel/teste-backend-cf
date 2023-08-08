<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\MedicoPacienteController;
use App\Http\Controllers\PacienteController;
use App\Models\MedicoPaciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class,'login'])->name('login');

Route::get('/cidades', [CidadeController::class, 'listar'])->name('cidades.listar');

Route::get('/medicos', [MedicoController::class, 'listar'])->name('medicos.listar');
Route::get('/cidades/{id}/medicos', [CidadeController::class, 'listarMedicos'])->name('medicos.listar');

// Rotas autenticadas da API
Route::middleware(['auth:api'])->group(function () {
    Route::post('/medicos/{id}/pacientes', [MedicoPacienteController::class, 'create'])->name('medico.vincular.paciente');
    Route::get('/medicos/{id}/pacientes', [MedicoPacienteController::class, 'listar'])->name('medico.listar.pacientes');
    Route::post('/medicos', [MedicoController::class, 'create'])->name('medicos.create');
    
    Route::post('/pacientes', [PacienteController::class, 'create'])->name('paciente.create');
    Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('paciente.update');
});
