<?php

namespace App\Http\Controllers;


use App\Imagen;
use App\Categoria;
use App\Establecimiento;
use Illuminate\Http\Request;

class APIController extends Controller
{


    // Metodo para obtener todos los establecimientos
    public function index(){
        $establecimientos = Establecimiento::with('categoria')->get();

        return response()->json($establecimientos);

    }
    // Metodo para obtener todas las categorias
    public function  categorias(){

        $categorias = Categoria::all();

        return response()->json($categorias);
    }

    // Metodo para obtener una categoria por un id
    public function categoria( Categoria $categoria ){

        // Obtener los establecimientos por la categoria nos traemos la info de la categoria gracias a
        // la relacion creada en el modelo de establecimiento entre este y la categoria
        $establecimientos = Establecimiento::where('categoria_id', $categoria->id)->with('categoria')->take(3)->get();
        return response()->json($establecimientos);

    }

    public function establecimientoscategoria(Categoria $categoria){

        $establecimientos = Establecimiento::where('categoria_id', $categoria->id)->with('categoria')->get();
        return response()->json($establecimientos);
    }

    // Muestra un establecimiento
    public function show( Establecimiento $establecimiento ){

        $imagenes = Imagen::where('id_establecimiento' , $establecimiento->uuid)->get();
        $establecimiento->imagenes = $imagenes;

        return response()->json($establecimiento);
    }

    // Muestra los likes de un establecimiento
    public function establecimientosLikes(Establecimiento $establecimiento){

        $likes = count($establecimiento->likes);

        return response()->json($likes);
    }

    // Devueve si el usuario dio like al establecimiento
    public function userLike(Establecimiento $establecimiento){

        $like = ( auth()->user() ) ? auth()->user()->meGusta->contains($establecimiento->id) : false;


        return $like;

    }




}
