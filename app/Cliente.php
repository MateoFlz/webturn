<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula' ,'name', 'email', 'telefono', 'state'
    ];

    public function scopeGetcliente($query, $modulo)
    {
        $listturno =  DB::table('turnos')
        ->select('servicioturnos.id_turnos', 'clientes.cedula', 'clientes.name',
         'turnos.fecha', 'turnos.inicio', 'turnos.fin','turnos.horario')
        ->join('clientes', 'clientes.id', '=', 'turnos.id_clientes')
        ->join('servicioturnos', 'servicioturnos.id_turnos', 'turnos.id')
        ->join('modulos', 'turnos.id_modulos', 'modulos.id')
        ->where('turnos.atendido', '1')
        ->where('turnos.id_modulos', $modulo)
        ->where('modulos.id_users', Auth::user()->id)
        ->groupBy('clientes.cedula','servicioturnos.id_turnos', 'clientes.name', 'turnos.fecha', 'turnos.inicio',  'turnos.fin', 'turnos.horario')
        ->paginate(5);

        return $listturno;
    }

    public function scopeGetnoatendido($query, $dependencia)
    {
        $listturno =  DB::table('turnos')
        ->select('turnos.id', 'clientes.cedula', 'clientes.name',
         'turnos.fecha', 'turnos.inicio', 'turnos.horario')
         ->join('clientes', 'clientes.id', '=', 'turnos.id_clientes')
         ->where('llamado', '0')
         ->orWhere('atendido', '0')
         ->where('id_dependencia', $dependencia)
        ->paginate(5);

        return $listturno;
    }

    public function scopeGetclientereport($query, $modulo)
    {
        $listturno =  DB::table('turnos')
        ->select('servicioturnos.id_turnos', 'clientes.cedula', 'clientes.name',
         'turnos.fecha', 'turnos.inicio', 'turnos.fin','turnos.horario')
        ->join('clientes', 'clientes.id', '=', 'turnos.id_clientes')
        ->join('servicioturnos', 'servicioturnos.id_turnos', 'turnos.id')
        ->join('modulos', 'turnos.id_modulos', 'modulos.id')
        ->where('turnos.atendido', '1')
        ->where('turnos.id_modulos', $modulo)
        ->where('modulos.id_users', Auth::user()->id)
        ->groupBy('clientes.cedula','servicioturnos.id_turnos', 'clientes.name', 'turnos.fecha', 'turnos.inicio',  'turnos.fin', 'turnos.horario')
        ->get();

        return $listturno;
    }

    public function scopeGetnoatendidoreport($query, $dependencia)
    {
        $listturno =  DB::table('turnos')
        ->select('turnos.id', 'clientes.cedula', 'clientes.name',
         'turnos.fecha', 'turnos.inicio', 'turnos.horario')
         ->join('clientes', 'clientes.id', '=', 'turnos.id_clientes')
         ->where('llamado', '0')
         ->orWhere('atendido', '0')
         ->where('id_dependencia', $dependencia)
        ->get();

        return $listturno;
    }
}
