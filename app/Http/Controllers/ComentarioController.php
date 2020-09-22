<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Comentario;
use App\Establecimiento;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Establecimiento $establecimiento)
    {
        //
        $notas = Nota::all();
        return view('comentario.create', compact('notas', 'establecimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Establecimiento $establecimiento)
    {


        // Validacion
        $data = $request->validate([
            'titulo' => 'required',
            'texto' => 'required|min:50',
            'servicio' => 'required',
            'precio' => 'required',
            'precio' => 'required',
            'nota' => 'required'

        ]);




        // Guardar en la db
        $comentario = new Comentario($data);
        $comentario->user_id = auth()->user()->id;
        $comentario->nota_id = $data['nota'];
        $comentario->establecimiento_id = $establecimiento->id;

        $userComentYet = Comentario::where('user_id', '=', auth()->user()->id)
                                    ->where('establecimiento_id' , '=' , $establecimiento->id)->get();

        if($userComentYet){
            return back()->with('estado', 'No puedes dejar más de un comentario por establecimiento');
        } else {
            $comentario->save();
            return back()->with('estado', 'Tu información se almacenó correctamente');
        }







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
