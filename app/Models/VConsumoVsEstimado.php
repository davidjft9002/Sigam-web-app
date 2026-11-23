<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VConsumoVsEstimado
 * 
 * @property int $id_orden_produccion
 * @property int $id_pedido
 * @property string $nombre_material
 * @property string $unidad_medida
 * @property float|null $cantidad_estimada
 * @property float $cantidad_consumida
 * @property float|null $diferencia
 * @property Carbon $fecha_consumo
 *
 * @package App\Models
 */
class VConsumoVsEstimado extends Model
{
	protected $table = 'v_consumo_vs_estimado';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_orden_produccion' => 'int',
		'id_pedido' => 'int',
		'cantidad_estimada' => 'float',
		'cantidad_consumida' => 'float',
		'diferencia' => 'float',
		'fecha_consumo' => 'datetime'
	];

	protected $fillable = [
		'id_orden_produccion',
		'id_pedido',
		'nombre_material',
		'unidad_medida',
		'cantidad_estimada',
		'cantidad_consumida',
		'diferencia',
		'fecha_consumo'
	];
}
