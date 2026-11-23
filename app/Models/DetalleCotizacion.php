<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCotizacion
 * 
 * @property int $id_cotizacion
 * @property int $id_producto
 * @property int $cantidad
 * @property float $precio_unitario
 * @property float $subtotal
 * @property string|null $observacion
 * 
 * @property Cotizacion $cotizacion
 * @property Producto $producto
 *
 * @package App\Models
 */
class DetalleCotizacion extends Model
{
	protected $table = 'detalle_cotizacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_cotizacion' => 'int',
		'id_producto' => 'int',
		'cantidad' => 'int',
		'precio_unitario' => 'float',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'cantidad',
		'precio_unitario',
		'subtotal',
		'observacion'
	];

	public function cotizacion()
	{
		return $this->belongsTo(Cotizacion::class, 'id_cotizacion');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_producto');
	}
}
