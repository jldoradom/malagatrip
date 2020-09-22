@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Cuentanos que te ha parecido</h1>
    <div class="mt-5 row justify-content-center ">
        <form method="POST"  action="{{ route('comentario.store', ['establecimiento' => $establecimiento->id]) }}"
                enctype="multipart/form-data"
                class="col-md-9 col-xs-12 card card-body">
                @csrf


            <fieldset class="border p-4 mt-5">
                <legend  class="text-primary">Tu comentario: </legend>
                <div class="form-group">
                    <label for="nombre">Titulo</label>
                    <input
                        class="form-control  @error('titulo')  is-invalid  @enderror"
                        name="titulo"
                        type="text"
                        value="{{ old('titulo') }}"
                    >

                        @error('titulo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                </div>
                    <div class="form-group">
                        <label for="nombre">Comentario</label>
                        <textarea
                            class="form-control  @error('texto')  is-invalid  @enderror"
                            name="texto"
                        >{{ old('texto') }}</textarea>

                            @error('texto')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

            </fieldset>
            <fieldset class="border p-4 mt-5">
                <legend  class="text-primary">Valoraciones: </legend>
                <div class="form-group">
                    <label for="nombre">¿Como fue el servicio que te dierón?</label>
                    <textarea
                        class="form-control  @error('servicio')  is-invalid  @enderror"
                        name="servicio"
                    >{{ old('servicio') }}</textarea>

                        @error('servicio')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                </div>
                    <div class="form-group">
                        <label for="nombre">Relacion calidad precio</label>
                        <select
                            class="form-control  @error('precio')  is-invalid  @enderror"
                            name="precio"
                        >
                            <option value="" selected disabled>-- Selecciona --</option>
                            <option value="muy malo">Muy malo</option>
                            <option value="malo">Malo</option>
                            <option value="normal">Normal</option>
                            <option value="muy bueno">Muy bueno</option>
                            <option value="excelente">Excelente</option>
                        </select>

                            @error('precio')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nota final</label>
                        <select
                            class="form-control  @error('nota')  is-invalid  @enderror"
                            name="nota"
                        >
                        <option value="" selected disabled>-- Selecciona --</option>
                        @foreach($notas as $nota)
                            <option
                             value="{{ $nota->id }}"
                             {{ old('$nota->id') == $nota->id ? 'selected' : '' }}>
                             {{ $nota->valor }}</option>
                        @endforeach
                        </select>
                            @error('nota')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

            </fieldset>


            <input type="submit" class="btn btn-primary mt-3 d-block"  value="Registrar Comentario">


        </form>
    </div>
</div>

@endsection
