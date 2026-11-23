<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VHistorialPedido
 * 
 * @property int $id_historial
 * @property int $id_pedido
 * @property string|null $cliente
 * @property Carbon $fecha_cambio
 * @property string|null $estado_anterior
 * @property string $estado_nuevo
 * @property string $estado_actual
 * @property string|null $observacion
 *
 * @package App\Models
 */
class VHistorialPedido extends Model
{
	protected $table = 'v_historial_pedidos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_historial' => 'int',
		'id_pedido' => 'int',
		'fecha_cambio' => 'datetime'
	];

	protected $fillable = [
		'id_historial',
		'id_pedido',
		'cliente',
		'fecha_cambio',
		'estado_anterior',
		'estado_nuevo',
		'estado_actual',
		'observacion'
	];
}
