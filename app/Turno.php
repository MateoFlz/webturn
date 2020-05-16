<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'llamado' ,'atendido', 'solucionado', 'observacion', 'fecha', 'inicio',
        'fin', 'id_users', 'id_clientes', 'id_modulos',
    ];
}
