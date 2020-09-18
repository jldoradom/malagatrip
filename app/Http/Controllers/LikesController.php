<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function update(Request $request, Establecimiento $establecimiento)
    {
        // Almacena los likes de un Usuario a una receta, toggle es un metodo que funciona como si fuera un switch
        // para poder quutar y poner el meGusta en la tabla
        return auth()->user()->meGusta()->toggle($establecimiento);
    }

}
