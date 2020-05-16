<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' ,'id_dependencias', 'id_users', 'state',
    ];

    public function scopeGetmodulos($query)
    {
        return $query->select('modulos.id', 'modulos.name','users.name as username','dependencias.name as namedependencia',
        'modulos.id_users', 'modulos.id_dependencias')
        ->join('dependencias','dependencias.id', '=', 'modulos.id_dependencias')
        ->join('users', 'users.id', '=', 'modulos.id_users')
        ->where('modulos.state', '1')
        ->get();
    }

    public function scopeUserstatemodulo($query, $id)
    {
        if($id)
        {
           $response = $query->where('id_users', $id)->where('state', '1')->get();
           if(count($response) > 0){
               return 1;
           }
           return 0;
        }

    }

    public function scopeGetmodulosforid($query, $id)
    {
        if($id)
        {
            return $query->select('modulos.id', 'modulos.name','users.name as username','dependencias.name as namedependencia',
            'modulos.id_users', 'modulos.id_dependencias')
            ->join('dependencias','dependencias.id', '=', 'modulos.id_dependencias')
            ->join('users', 'users.id', '=', 'modulos.id_users')
            ->where('modulos.state', '1')
            ->where('modulos.id_users', '=', $id)
            ->get();
        }

    }
}
