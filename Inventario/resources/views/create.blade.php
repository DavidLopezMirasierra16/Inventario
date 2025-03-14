@extends('layout.layout_create')

@section('titulo', 'Registra un producto')

@section('contenido')
    
    <div class="col-8 m-auto mt-3">

        <h3>Crea un producto</h3>

        @if (session('error'))
                <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        <form action={{route('crear_producto')}} method="POST" class="m-auto mt-5 bg-light p-4 shadow rounded">
            @csrf

            <div>
                <label for="" class="form-label bold">Nombre del producto</label>
            </div>
            <div>
                <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="form-label col-12">
            </div>
            <div>
                <label for="" class="form-label bold">Descripcion</label>
            </div>
            <div>
                <input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}" class="form-label col-12">
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for="" class="form-label bold">Precio</label>
                    </div>
                    <div>
                        <input type="text" id="precio" name="precio" value="{{old('precio')}}" class="form-label col-12" placeholder="00.00">
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="" class="form-label bold">Cantidad</label>
                    </div>
                    <div>
                        <input type="text" id="cantidad" name="cantidad" value="{{old('cantidad')}}" class="form-label col-12">
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
                                    <option value={{$categoria->id}}>{{$categoria->nombre}}</option>
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
                        <select name="proveedor" id="proveedor">´
                            @isset($proveedores)
                                @foreach ($proveedores as $proveedor)
                                    <option value={{$proveedor->id}}>{{$proveedor->nombre}}</option>
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