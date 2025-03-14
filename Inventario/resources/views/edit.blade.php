@extends('layout.layout_create')

@section('titulo', 'Registra un producto')

@section('contenido')
    
    <div class="col-8 m-auto mt-3">

        <h3>Edita el producto {{$producto_editar->nombre}}</h3>

        @if (session('error'))
                <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        <form action={{route('editar_producto', $producto_editar->id)}} method="POST" class="m-auto mt-5 bg-light p-4 shadow rounded">
            @csrf
            @method('PUT')

            <div>
                <label for="" class="form-label bold">Nombre del producto</label>
            </div>
            <div>
                <input type="text" id="nombre" name="nombre" value="{{$producto_editar->nombre}}" class="form-label col-12">
            </div>
            <div>
                <label for="" class="form-label bold">Descripcion</label>
            </div>
            <div>
                <input type="text" id="descripcion" name="descripcion" value="{{$producto_editar->descripcion}}" class="form-label col-12">
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="" class="form-label bold">Precio</label>
                    </div>
                    <div>
                        <input type="text" id="precio" name="precio" value="{{$producto_editar->precio}}" class="form-label col-12" placeholder="00.00">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="" class="form-label bold">Cantidad</label>
                    </div>
                    <div>
                        <input type="text" id="cantidad" name="cantidad" value="{{$producto_editar->cantidad}}" class="form-label col-12">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="" class="form-label bold">Categoria</label>
                    </div>
                    <div>
                        <select name="categoria" id="categoria">
                            @isset($categorias)
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" 
                                        {{ $producto_editar->categoria->id == $categoria->id ? 'selected' : '' }}> <!--Nos lo selecciona-->
                                        {{ $producto_editar->categoria->id == $categoria->id ? $producto_editar->categoria->nombre : $categoria->nombre }} <!--Nos pone el nombre-->
                                    </option>
                                @endforeach
                            @endisset
                        </select>                        
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="" class="form-label bold">Proveedor</label>
                    </div>
                    <div>
                        <select name="proveedor" id="proveedor">
                            @isset($proveedores)
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}" 
                                        {{ $producto_editar->proveedore->id == $proveedor->id ? 'selected' : '' }}> <!--Nos lo selecciona-->
                                        {{ $producto_editar->proveedore->id == $proveedor->id ? $producto_editar->proveedore->nombre : $proveedor->nombre }} <!--Nos pone el nombre-->
                                    </option>
                                @endforeach
                            @endisset
                        </select>                        
                    </div>
                </div>
            </div>
                
            <input type="submit" value="Guardar" class="btn btn-success mt-4">
        </form>

        <a type="button" class="btn btn-dark mt-5" href={{route('index_productos')}}>Volver</a>

    </div>

@endsection