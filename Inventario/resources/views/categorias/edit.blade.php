@extends('layout.layout_create')

@section('titulo', 'Crea una categoria')

@section('contenido')

    <div class="col-8 m-auto mt-3">
        <h3>Edita la categoria {{$categoria->nombre}}</h3>

        @if (session('error'))
            <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        <form action={{route('editar_categoria', $categoria->id)}} method="POST" class="m-auto mt-5 bg-light p-4 shadow rounded">
            @csrf
            @method('PUT')

            <div>
                <label for="" class="form-label bold">Nombre de la categoria</label>
            </div>
            <div>
                <input type="text" id="categoria" name="categoria" value={{$categoria->nombre}} class="form-label col-12">
            </div>

            <input type="submit" value="Guardar" class="btn btn-success">
        </form>
        
        <a type="button" class="btn btn-dark mt-5" href={{route('index_categorias')}}>Volver</a>

    </div>

@endsection