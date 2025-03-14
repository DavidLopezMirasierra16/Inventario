@extends('layout.layout_create')

@section('titulo', 'Modifica un proveedor')

@section('contenido')
    
    <div class="col-8 m-auto mt-3">
        <h3>Actualiza el proveedor {{$proveedor->nombre}}</h3>

        @if (session('error'))
                <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        <form action={{route('editar_proveedor', $proveedor->id)}} method="POST" class="m-auto mt-5 bg-light p-4 shadow rounded">
            @csrf
            @method('PUT')

            <div>
                <label for="" class="form-label bold">Nombre del proveedor</label>
            </div>
            <div>
                <input type="text" id="nombre" name="nombre" value="{{$proveedor->nombre}}" class="form-label col-12">
            </div>
            <div>
                <label for="" class="form-label bold">Correo de contacto</label>
            </div>
            <div>
                <input type="text" id="correo_contacto" name="correo_contacto" value="{{$proveedor->correo_contacto}}" class="form-label col-12">
            </div>
            <div>
                <label for="" class="form-label bold">Telefono</label>
            </div>
            <div>
                <input type="text" id="telefono" name="telefono" value="{{$proveedor->telefono}}" class="form-label col-12">
            </div>

            <input type="submit" value="Guardar" class="btn btn-success">
        </form>
        
        <a type="button" class="btn btn-dark mt-5" href={{route('index_proveedores')}}>Volver</a>

    </div>

@endsection