<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VCatalogoProducto
 * 
 * @property int $id_producto
 * @property string $nombre_producto
 * @property string $categoria
 * @property string|null $descripcion_producto
 * @property float $precio_base
 * @property string $estado
 *
 * @package App\Models
 */
class VCatalogoProducto extends Model
{
	protected $table = 'v_catalogo_productos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_producto' => 'int',
		'precio_base' => 'float'
	];

	protected $fillable = [
		'id_producto',
		'nombre_producto',
		'categoria',
		'descripcion_producto',
		'precio_base',
		'estado'
	];
}
