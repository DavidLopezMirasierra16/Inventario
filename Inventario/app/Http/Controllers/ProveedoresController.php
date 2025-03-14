<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedore::paginate(10);
        return view('proveedores/index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_crear)
    {
        $datos_crear->flash();
        $validator = Validator::make($datos_crear->all(), [
            'nombre' => 'required',
            'correo_contacto' => 'required|unique:proveedores',
            'telefono' => 'required|min:9|max:9'
        ]);

        if ($validator->fails()) {
            return redirect('#')->with('error', 'Error en la validación, no se valen campos vacios, correos ya registrados ni telefonos no permitidos');
        }

        $proveedor = new Proveedore();

        $proveedor->nombre = $datos_crear->nombre;
        $proveedor->correo_contacto = $datos_crear->correo_contacto;
        $proveedor->telefono = $datos_crear->telefono;
        $proveedor->save();
        return redirect('/proveedores')->with('exito', 'Proveedor creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedore::find($id);

        if (!$proveedor) {
            return redirect('/proveedores')->with('error', 'No se encuentra el proovedor nº ' . $id);
        }

        return view('proveedores/edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_editar, string $id)
    {
        $proveedor_editar = Proveedore::find($id);

        if (!$proveedor_editar) {
            return redirect('/proveedores')->with('error', 'No se pudo editar el proveedor nº ' . $id);
        }

        $validator = Validator::make($datos_editar->all(), [
            'nombre' => 'required',
            'correo_contacto' => 'required',
            'telefono' => 'required|min:9|max:9'
        ]);

        if ($validator->fails()) {
            return redirect('#')->with('error', 'Error en la validación, no se valen campos vacios, correos ya registrados ni telefonos no permitidos');
        }

        $proveedor_editar->nombre = $datos_editar->nombre;
        $proveedor_editar->correo_contacto = $datos_editar->correo_contacto;
        $proveedor_editar->telefono = $datos_editar->telefono;
        $proveedor_editar->save();

        return redirect('/proveedores')->with('exito', 'Proveedor ' . $datos_editar->nombre . ' editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor_eliminar = Proveedore::find($id);

        if ($proveedor_eliminar->productos->count() > 0) {
            return redirect('/proveedores')->with('error', 'El proveedor ' . strtoupper($proveedor_eliminar->nombre) . ' tiene ' . $proveedor_eliminar->productos->count() . ' producto/s');
        }

        $proveedor_eliminar->delete();
        return redirect('/proveedores')->with('exito', 'Proveedor ' . strtoupper($proveedor_eliminar->nombre) . ' eliminado correctamente');
    }
}
