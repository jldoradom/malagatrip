<?php

namespace App;

use App\Establecimiento;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //


    // Leer las rutas por el slug en lugar del id para que las url de la api funcion con el slug
    public function getRouteKeyName(){
        return 'slug';
    }

    // Relacion de 1:n entre categorias y establecimientos
    public function establecimientos(){
       return $this->hasMany(Establecimiento::class);
    }
}
