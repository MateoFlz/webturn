<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configurar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'crear' ,'editar', 'eliminar', 'ver', 
    ];

}
