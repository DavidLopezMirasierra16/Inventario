<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedore::all();

        return view('create', compact('categorias', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_crear)
    {

        $validator = Validator::make($datos_crear->all(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('#')->with('error', 'No se permiten campos vacios, el precio tiene que ser un decimal positivo y la cantidad no puede ser un numero negativo');
        }

        $newProducto = new Producto();

        $newProducto->nombre = $datos_crear->nombre;
        $newProducto->descripcion = $datos_crear->descripcion;
        $newProducto->precio = $datos_crear->precio;
        $newProducto->cantidad = $datos_crear->cantidad;
        $newProducto->categoria_id = $datos_crear->categoria;
        $newProducto->proveedor_id = $datos_crear->proveedor;
        $newProducto->save();

        return redirect('/productos')->with('exito', 'Producto ' . $datos_crear->nombre . ' creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect('/productos')->with('error', 'No se enceuntra el producto nº ' . $id);
        }

        return view('show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto_editar = Producto::find($id);

        if (!$producto_editar) {
            return redirect('/productos')->with('error', 'No se encuentra el producto nº ' . $id);
        }

        $categorias = Categoria::all();
        $proveedores = Proveedore::all();

        return view('edit', compact('producto_editar', 'categorias', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_editar, string $id)
    {
        $producto = Producto::find($id);

        $validator = Validator::make($datos_editar->all(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('#')->with('error', 'No se permiten campos vacios, el precio tiene que ser un decimal positivo y la cantidad no puede ser un numero negativo');
        }

        $producto->nombre = $datos_editar->nombre;
        $producto->descripcion = $datos_editar->descripcion;
        $producto->precio = $datos_editar->precio;
        $producto->cantidad = $datos_editar->cantidad;
        $producto->categoria_id = $datos_editar->categoria;
        $producto->proveedor_id = $datos_editar->proveedor;
        $producto->save();

        return redirect('/productos')->with('exito', 'Producto ' . $datos_editar->nombre . ' creado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);

        $producto->delete();
        return redirect('/productos')->with('exito', 'Producto ' . $producto->nombre . ' eliminado correctamente');
    }
}
