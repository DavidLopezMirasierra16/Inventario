<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::paginate(10);

        return view('categorias/index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos_crear)
    {

        $validator = Validator::make($datos_crear->all(), [
            'categoria' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/categorias')->with('error', 'El nombre de la categoria no puede estar vacio');
        } else {
            $categoria = new Categoria();

            $categoria->nombre = $datos_crear->categoria;
            $categoria->save();

            return redirect('/categorias')->with('exito', 'Categoria ' . $datos_crear->categoria . ' creada correctamente');
        }
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
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return redirect('/categorias')->with('error', 'La categoria con el id ' . $id . ' no existe');
        }

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $datos_editar, string $id)
    {
        $categoria_editar = Categoria::find($id);

        $validator = Validator::make($datos_editar->all(), [
            'categoria' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('#')->with('error', 'El campo de nombre no puede ser vacio');
        }

        $categoria_editar->nombre = $datos_editar->categoria;
        $categoria_editar->save();

        return redirect('/categorias')->with('exito', 'Categoria ' . $categoria_editar->nombre . ' editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria_eliminar = Categoria::find($id);

        if ($categoria_eliminar->productos->count() > 0) {
            return redirect('/categorias')->with('error', 'La categoria ' . strtoupper($categoria_eliminar->nombre) . ' tiene ' . $categoria_eliminar->productos->count() . ' producto/s');
        }

        $categoria_eliminar->delete();
        return redirect('/categorias')->with('exito', 'Categoria ' . strtoupper($categoria_eliminar->nombre) . ' eliminada con éxito');
    }
}
