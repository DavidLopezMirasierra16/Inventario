@extends('layout.layout_create')

@section('titulo', 'Datos del producto')

@section('contenido')

<section class="container mt-5 p-4 shadow mb-5 bg-body-tertiary rounded">
    <h4 class="text-center mb-4">{{$producto->nombre}}</h4>

    <div class="col-9 m-auto">
        <hr>
        <div class="row mb-4">
            <div class="col">
                <p><strong>Nombre:</strong> {{$producto->nombre}}</p>
            </div>
            <div class="col">
                <p><strong>Descripción:</strong> {{$producto->descripcion}}</p>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col">
                <h5>Proveedor</h5>
                <hr>
                <div>
                    <p><strong>Nombre:</strong> {{$producto->proveedore->nombre}}</p>
                    <p><strong>Correo de contacto:</strong> <a href="mailto:{{$producto->proveedore->correo_contacto}}">{{$producto->proveedore->correo_contacto}}</a></p>
                    <p><strong>Teléfono:</strong> {{$producto->proveedore->telefono}}</p>
                </div>
            </div>
            <div class="col">
                <h5 class="">Detalles del Producto</h5>
                <hr>
                <p><strong>Precio:</strong> {{$producto->precio}}</p>
                <p><strong>Stock:</strong> {{$producto->cantidad}}</p>
                <p><strong>Categoría:</strong> {{$producto->categoria->nombre}}</p>
            </div>
        </div>
    </div>

    <div>
        <a href={{route('index_productos')}} class="btn btn-dark mt-5">Volver</a>
    </div>

</section>

@endsection
