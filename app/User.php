<?php

namespace App;

use App\Rol;
use App\Establecimiento;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion 1:1 entre usuario y establecimeinto
    public function establecimiento(){

        return $this->hasOne(Establecimiento::class);
    }

    // Relacion entre el usuario y el rol
    public function rol(){
        return $this->belongsTo(Rol::class);
    }

    // Establecimiento a los que dio me gusta
    public function meGusta(){
        return $this->belongsToMany(Establecimiento::class, 'likes_establecimiento');
    }
}
