<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VOrdenesProduccion
 * 
 * @property int $id_orden_produccion
 * @property int $id_pedido
 * @property string|null $cliente
 * @property Carbon $fecha_entrega
 * @property string|null $operario
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property int|null $dias_fabricacion
 * @property string $estado_orden
 * @property string|null $observaciones
 *
 * @package App\Models
 */
class VOrdenesProduccion extends Model
{
	protected $table = 'v_ordenes_produccion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_orden_produccion' => 'int',
		'id_pedido' => 'int',
		'fecha_entrega' => 'datetime',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'dias_fabricacion' => 'int'
	];

	protected $fillable = [
		'id_orden_produccion',
		'id_pedido',
		'cliente',
		'fecha_entrega',
		'operario',
		'fecha_inicio',
		'fecha_fin',
		'dias_fabricacion',
		'estado_orden',
		'observaciones'
	];
}
