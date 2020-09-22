<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    //
    protected $fillable = [
        'nombre',
        'categoria_id',
        'imagen_principal',
        'direccion',
        'zona',
        'lat',
        'lng',
        'telefono',
        'descripcion',
        'apertura',
        'cierre',
        'uuid',
        'user_id'
    ];

    // Relacion 1:1 entre el establecimiento y la categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    // Likes que tiene el establecimiento
    public function likes(){
        return $this->belongsToMany(User::class, 'likes_establecimiento');
    }

    // Relacion entre el establecimiento y los comentarios
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
