<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class Turno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'llamado' ,'atendido', 'solucionado', 'observacion', 'fecha', 'inicio',
        'fin', 'horario', 'id_users', 'id_clientes', 'id_dependencia', 'id_modulos',
    ];



    public function scopeGeturnoday($query, $dependencia)
    {
        $turnos = $this->turno = DB::table('turnos')->select('clientes.*', 'turnos.id', 'clientes.id as idclient')
        ->join('clientes', 'turnos.id_clientes', '=', 'clientes.id')
        ->where('turnos.fecha', date('Y-m-d'))
        ->where('turnos.horario', date('A'))
        ->where('turnos.llamado', '0')
        ->where('turnos.id_dependencia', $dependencia)->get();

        return $turnos;
    }

    public function scopeGetservicios($query)
    {
        $servicio = DB::table('servicios')
        ->select('servicios.id', 'servicios.descripcion')
        ->join('dependenciaservicios', 'servicios.id', '=', 'dependenciaservicios.id_servicios')
        ->join('dependencias', 'dependenciaservicios.id_dependencias', '=', 'dependencias.id')
        ->join('modulos', 'modulos.id_dependencias', '=', 'dependencias.id')
        ->where('modulos.id_users', Auth::user()->id)
        ->get();
        return $servicio;
    }


    public function scopeGetdependenciauser($query){
        $dependencia = DB::table('dependencias')
        ->join('modulos', 'modulos.id_dependencias', '=', 'dependencias.id')
        ->where('modulos.id_users', '=',  Auth::user()->id)->value('dependencias.id');
        return $dependencia;
    }

    public function scopeFirstllamado($query, $dependencia){
        $turnos = $this->turno = DB::table('turnos')->select('clientes.*', 'turnos.id')
        ->join('clientes', 'turnos.id_clientes', '=', 'clientes.id')
        ->where('turnos.fecha', date('Y-m-d'))
        ->where('turnos.horario', date('A'))
        ->where('turnos.llamado', '1')
        ->where('turnos.atendido', '0')
        ->where('turnos.id_dependencia', $dependencia)->get();

        return $turnos;
    }

    public function scopeGetlist($query)
    {
        $list = DB::table('turnos')->select('modulos.name as namemodulo', 'clientes.name as namecliente', 'clientes.cedula')
        ->join('clientes', 'turnos.id_clientes', '=', 'clientes.id')
        ->join('modulos', 'modulos.id', '=', 'turnos.id_modulos')
        ->where('turnos.fecha', date('Y-m-d'))
        ->where('turnos.llamado', '1')
        ->where('turnos.atendido', '0')
        ->where('turnos.horario', date('A'))
        ->orderBy('turnos.created_at', 'desc')
        ->paginate(5);

        return $list;

    }

    public function scopeGetTurnoservices($query)
    {
        $turnoservice = DB::table('servicioturnos')->select('servicioturnos.id_turnos', 'servicios.descripcion')
        ->join('servicios', 'servicios.id', '=', 'servicioturnos.id_servicios')
        ->get();
        return $turnoservice;
    }
}
