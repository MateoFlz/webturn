<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicioturno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha' ,'id_servicios', 'id_turnos',
    ];

}
