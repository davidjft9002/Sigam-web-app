<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VEstimacionMaterialesPedido
 * 
 * @property int $id_pedido
 * @property string|null $cliente
 * @property string $nombre_material
 * @property string $unidad_medida
 * @property float $cantidad_requerida
 * @property float $stock_actual
 * @property string $disponibilidad
 * @property string|null $observacion
 *
 * @package App\Models
 */
class VEstimacionMaterialesPedido extends Model
{
	protected $table = 'v_estimacion_materiales_pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'cantidad_requerida' => 'float',
		'stock_actual' => 'float'
	];

	protected $fillable = [
		'id_pedido',
		'cliente',
		'nombre_material',
		'unidad_medida',
		'cantidad_requerida',
		'stock_actual',
		'disponibilidad',
		'observacion'
	];
}
