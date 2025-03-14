<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 * 
 * @property int $id
 * @property string $nombre
 * @property string $correo_contacto
 * @property string $telefono
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Proveedore extends Model
{
	protected $table = 'proveedores';

	protected $fillable = [
		'nombre',
		'correo_contacto',
		'telefono'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'proveedor_id');
	}
}
