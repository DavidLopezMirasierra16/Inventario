@extends('layout.layout_create')

@section('titulo', 'Registra un proveedor')

@section('contenido')
    
    <div class="col-8 m-auto mt-3">

        @if (session('error'))
                <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        <h3>Crea una proveedor</h3>
        <form action={{route('crear_proveedor')}} method="POST" class="m-auto mt-5 p-4 shadow rounded">
            @csrf

            <div>
                <label for="" class="form-label bold">Nombre del proveedor</label>
            </div>
            <div>
                <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="form-label col-12">
            </div>
            <div>
                <label for="" class="form-label bold">Correo de contacto</label>
            </div>
            <div>
                <input type="text" id="correo_contacto" name="correo_contacto" value="{{old('correo_contacto')}}" class="form-label col-12">
            </div>
            <div>
                <label for="" class="form-label bold">Telefono</label>
            </div>
            <div>
                <input type="text" id="telefono" name="telefono" value="{{old('telefono')}}" class="form-label col-12">
            </div>

            <input type="submit" value="Guardar" class="btn btn-success mt-4">
        </form>
        
        <a type="button" class="btn btn-dark mt-5" href={{route('index_proveedores')}}>Volver</a>

    </div>

@endsection