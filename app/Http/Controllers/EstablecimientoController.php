<?php

namespace App\Http\Controllers;

use App\Imagen;
use App\Categoria;
use App\Establecimiento;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EstablecimientoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();

        return view('establecimientos.create' , compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacio
        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_principal' => 'required|image|max:1000',
            'direccion' => 'required',
            'zona' => 'required',
            'lat' =>  'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'

        ]);

        // Guardar la imagen
        $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

        // Resize
        $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 600);
        $img->save();



        // Guardar en la DB
        // paso1:auth para obtener el user autenticado
        // paso2: con user accedemos a la relacion
        // paso3: gracias a la relacion podemos almacenar el establecimiento relacionado con el user
        // auth()->user()->establecimiento()->create([
        //     'nombre' => $data['nombre'],
        //     'categoria_id' => $data['categoria_id'],
        //     'imagen_principal' => $ruta_imagen,
        //     'direccion' => $data['direccion'],
        //     'zona' =>  $data['zona'],
        //     'lat' =>  $data['lat'],
        //     'lng' => $data['lng'],
        //     'telefono' => $data['telefono'],
        //     'descripcion' => $data['descripcion'],
        //     'apertura' =>  $data['apertura'],
        //     'cierre' => $data['cierre'],
        //     'uuid' => $data['uuid'],
        // ]);

        // Gaudar en DB 2º forma mas corta poniendo como fillable en el modelo establecimiento el user_id
        $establecimiento = new Establecimiento($data);
        $establecimiento->imagen_principal = $ruta_imagen;
        $establecimiento->user_id = auth()->user()->id;
        $establecimiento->save();



        // Devolvemos un mensaje que se podra ver gracias a session('estado')
        return back()->with('estado', 'Tu información se almaceno correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {
        // Obtener todas las categorias
        $categorias = Categoria::all();

        //Obtener el establecimiento gracias a la relacion con el usuario logeado
        $establecimiento = auth()->user()->establecimiento;
        // Para arreglar el fallo en firefox ya que este navegador añade los segundos
        $establecimiento->apertura = date('H:i', strtotime($establecimiento->apertura));
        $establecimiento->cierre = date('H:i', strtotime($establecimiento->cierre));
        // Obtiene las imagenes del establecimiento
        $imagenes = Imagen::where('id_establecimiento' , $establecimiento->uuid)->get();

        return view('establecimientos.edit' , compact('categorias' , 'establecimiento' , 'imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        // Ejecutar  Policy
        $this->authorize('update', $establecimiento);
        // Validar
        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_principal' => 'image|max:1000',
            'direccion' => 'required',
            'zona' => 'required',
            'lat' =>  'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'

        ]);

        $establecimiento->nombre = $data['nombre'];
        $establecimiento->categoria_id = $data['categoria_id'];
        $establecimiento->direccion = $data['direccion'];
        $establecimiento->zona = $data['zona'];
        $establecimiento->lat = $data['lat'];
        $establecimiento->lng = $data['lng'];
        $establecimiento->telefono = $data['telefono'];
        $establecimiento->descripcion = $data['descripcion'];
        $establecimiento->apertura = $data['apertura'];
        $establecimiento->cierre = $data['cierre'];
        $establecimiento->uuid = $data['uuid'];

        // Si sube una imgen la actualizamos
        if(request('imagen_principal')){
            // Guardar la imagen
            $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

            // Resize
            $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 600);
            $img->save();

            $establecimiento->imagen_principal = $ruta_imagen;
        }

        $establecimiento->save();

        // Mensaje
        return back()->with('estado', 'Tu información se almaceno correctamnete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento)
    {
        //
    }



}
