<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property float $precio
 * @property int $cantidad
 * @property int $categoria_id
 * @property int $proveedor_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Categoria $categoria
 * @property Proveedore $proveedore
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';

	protected $casts = [
		'precio' => 'float',
		'cantidad' => 'int',
		'categoria_id' => 'int',
		'proveedor_id' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'precio',
		'cantidad',
		'categoria_id',
		'proveedor_id'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class);
	}

	public function proveedore()
	{
		return $this->belongsTo(Proveedore::class, 'proveedor_id');
	}
}
