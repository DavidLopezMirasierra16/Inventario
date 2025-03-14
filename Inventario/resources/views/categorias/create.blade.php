@extends('layout.layout_create')

@section('titulo', 'Crea una categoria')

@section('contenido')
    
    <div class="col-8 m-auto mt-3">
        <h3>Crea una categoria</h3>
        <form action={{route('crear_categoria')}} method="POST" class="m-auto mt-5 bg-light p-4 shadow rounded">
            @csrf

            <div>
                <label for="" class="form-label bold">Nombre de la categoria</label>
            </div>
            <div>
                <input type="text" id="categoria" name="categoria" class="form-label col-12">
            </div>

            <input type="submit" value="Guardar" class="btn btn-success mt-4">
        </form>
        
        <a type="button" class="btn btn-dark mt-5" href={{route('index_categorias')}}>Volver</a>

    </div>

@endsection