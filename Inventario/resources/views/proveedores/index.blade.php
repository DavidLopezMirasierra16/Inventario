@extends('layout.layout_index')

@section('titulo', 'Proveedores')
    
@section('contenido')
    
    <section>
        
        <h3 class="mt-5">Proveedores</h3>
    
        <div>
            <a type="button" href={{route('formulario_proveedor')}} class="text-decoration-none inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Registra un proveedor</a>
        </div>
    
        <div>
    
            @if (session('error'))
                    <div class="alert alert-danger mt-4">{{ session('error') }}</div>
            @endif
            @if (session('exito'))
                    <div class="alert alert-success mt-4">{{ session('exito') }}</div>
            @endif
    
            @isset($proveedores)
                
                <table class="table mt-4 table-hover">
                    <thead class="table-light">
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Telefono</th>
                          <th scope="col">Productos</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Eliminar</th>
                        </tr>
                      </thead>
                    
                    <tbody class="table-light">
                        @foreach ($proveedores as $proveedor)
                            <tr scope="row">
                                <td>{{$proveedor->nombre}}</td>
                                <td>{{$proveedor->correo_contacto}}</td>
                                <td>{{$proveedor->telefono}}</td>
                                <td>{{$proveedor->productos->count()}}</td>
                                <td><a type="button" class="text-decoration-none inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href={{route('mostrar_proveedor', $proveedor->id)}}>Actualizar</a></td>
                                <td>
                                    <form action={{route('eliminar_proveedor', $proveedor->id)}} method="POST">
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
    
                <div class="mb-5">
                    {{$proveedores->links()}}
                </div>
    
            @endisset
    
        </div>
        
    </section>

@endsection