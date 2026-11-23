<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VDetalleCotizacionProducto
 * 
 * @property int $id_cotizacion
 * @property Carbon $fecha_cotizacion
 * @property int $id_producto
 * @property string $nombre_producto
 * @property string $categoria
 * @property int $cantidad
 * @property float $precio_unitario
 * @property float $subtotal
 * @property string $estado_cotizacion
 * @property string|null $observacion
 *
 * @package App\Models
 */
class VDetalleCotizacionProducto extends Model
{
	protected $table = 'v_detalle_cotizacion_productos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_cotizacion' => 'int',
		'fecha_cotizacion' => 'datetime',
		'id_producto' => 'int',
		'cantidad' => 'int',
		'precio_unitario' => 'float',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'id_cotizacion',
		'fecha_cotizacion',
		'id_producto',
		'nombre_producto',
		'categoria',
		'cantidad',
		'precio_unitario',
		'subtotal',
		'estado_cotizacion',
		'observacion'
	];
}
