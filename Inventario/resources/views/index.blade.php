@extends('layout.layout_index')

@section('titulo', 'Productos')
    
@section('contenido')
    
    <section>

        <h3 class="mt-5">Productos</h3>
    
        <div>
            <a type="button" href={{route('formulario_producto')}} class="text-decoration-none inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Crear un producto</a>
        </div>

        <div>

            @if (session('error'))
                <div class="alert alert-danger mt-4">{{ session('error') }}</div>
            @endif
            @if (session('exito'))
                <div class="alert alert-success mt-4">{{ session('exito') }}</div>
            @endif
        
            @isset($productos)
                
                <table class="table mt-4 table-hover">
                    <thead class="table-light">
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody class="table-light">
                        @foreach ($productos as $producto)
                            <tr scope="row">
                                <td><a href={{route('detalle_producto', $producto->id)}} class="text-decoration-none">{{$producto->nombre}}</a></td>
                                <td>{{$producto->descripcion}}</td>
                                <td><a type="button" href={{route('mostrar_producto', $producto->id)}} class="text-decoration-none inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Actualizar</a></td>
                                <td>
                                    <form action={{route('eliminar_producto', $producto->id)}} method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a type="submit" class="text-decoration-none inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            <button>ELIMINAR</button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endisset
        
            <div class="mb-5">
                {{$productos->links()}}
            </div>

        </div>

    </section>

@endsection