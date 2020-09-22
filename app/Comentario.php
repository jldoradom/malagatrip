<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $fillable = [

        'titulo',
        'texto',
        'servicio',
        'precio',
        'nota_id',
        'user_id',
        'establecimiento_id'
    ];

    // Relacion entre los comnetarios y los establecimientos
    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class);
    }
}
