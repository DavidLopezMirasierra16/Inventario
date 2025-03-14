<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/productos')->group(function(){

    //Ruta que nos lleva al index de productos
    Route::get('/', [ProductosController::class, 'index'])->name('index_productos');

    //Ruta que nos lleva a crear un producto
    Route::get('/formProducto', [ProductosController::class, 'create'])->name('formulario_producto');

    //Ruta que nos crea un producto
    Route::post('/formProducto', [ProductosController::class, 'store'])->name('crear_producto');

    //Ruta que nos lleva a los detalles del producto
    Route::get('/detalles/{id}', [ProductosController::class, 'show'])->name('detalle_producto');

    //Ruta que nos lleva al formulario de editar
    Route::get('/editar/{id}', [ProductosController::class, 'edit'])->name('mostrar_producto');

    //Ruta que nos edita el producto
    Route::put('/editar/{id}', [ProductosController::class, 'update'])->name('editar_producto');

    //Ruta que nos elimina el producto
    Route::delete('/eliminar/{id}', [ProductosController::class, 'destroy'])->name('eliminar_producto');

});

Route::prefix('/categorias')->group(function(){

    //Ruta que nos lleva al index de categorias
    Route::get('/', [CategoriasController::class, 'index'])->name('index_categorias');

    //Ruta que nos lleva a crear una categoria
    Route::get('/formCategoria', [CategoriasController::class, 'create'])->name('formulario_categoria');

    //Ruta que nos crea la categoria
    Route::post('/formCategoria', [CategoriasController::class, 'store'])->name('crear_categoria');

    //Ruta que nos lleva al formulario de editar
    Route::get('/editar/{id}', [CategoriasController::class, 'edit'])->name('mostrar_categoria');

    //Ruta que nos actualiza la categoria
    Route::put('/editar/{id}', [CategoriasController::class, 'update'])->name('editar_categoria');

    //Ruta que nos elimina una categoria
    Route::delete('/eliminar/{id}', [CategoriasController::class, 'destroy'])->name('eliminar_categoria');

});


Route::prefix('/proveedores')->group(function(){

    //Ruta que nos lleva al index de proveedores
    Route::get('/', [ProveedoresController::class, 'index'])->name('index_proveedores');

    //Ruta que nos lleva a crear un proveedor
    Route::get('/formProveedor', [ProveedoresController::class, 'create'])->name('formulario_proveedor');

    //Ruta que nos crea el proveedor
    Route::post('/formProveedor', [ProveedoresController::class, 'store'])->name('crear_proveedor');

    //Ruta que nos lleva al formulario de editar
    Route::get('/editar/{id}', [ProveedoresController::class, 'edit'])->name('mostrar_proveedor');

    //Ruta que nos actualiza un proveedor
    Route::put('/editar/{id}', [ProveedoresController::class, 'update'])->name('editar_proveedor');

    //Ruta que nos elimina un proveedor
    Route::delete('/eliminar/{id}', [ProveedoresController::class, 'destroy'])->name('eliminar_proveedor');

});