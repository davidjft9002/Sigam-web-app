<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id_producto
 * @property string $nombre_producto
 * @property string|null $descripcion_producto
 * @property int $id_categoria
 * @property float $precio_base
 * @property string $estado
 * 
 * @property Categorium $categorium
 * @property Collection|DetalleCotizacion[] $detalle_cotizacions
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'producto';
	protected $primaryKey = 'id_producto';
	public $timestamps = false;

	protected $casts = [
		'id_categoria' => 'int',
		'precio_base' => 'float'
	];

	protected $fillable = [
		'nombre_producto',
		'descripcion_producto',
		'id_categoria',
		'precio_base',
		'estado'
	];

	public function categorium()
	{
		return $this->belongsTo(Categorium::class, 'id_categoria');
	}

	public function detalle_cotizacions()
	{
		return $this->hasMany(DetalleCotizacion::class, 'id_producto');
	}
}
