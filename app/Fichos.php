<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichos extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'fecha' ,'turnosdeldia', 'numerodeturnos', 'id_dependencias', 'horario',
   ];

   public function scopeCreateturno($query)
   {
       $query->join('dependencias', function($query)
       {
           $query->on('fichos.id_dependencias', '=', 'dependencias.id');
       })
       ->get();
   }

}
