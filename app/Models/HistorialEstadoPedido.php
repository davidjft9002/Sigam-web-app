<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialEstadoPedido
 * 
 * @property int $id_historial
 * @property int $id_pedido
 * @property string|null $estado_anterior
 * @property string $estado_nuevo
 * @property Carbon $fecha_cambio
 * @property string|null $observacion
 * 
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class HistorialEstadoPedido extends Model
{
	protected $table = 'historial_estado_pedido';
	protected $primaryKey = 'id_historial';
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'fecha_cambio' => 'datetime'
	];

	protected $fillable = [
		'id_pedido',
		'estado_anterior',
		'estado_nuevo',
		'fecha_cambio',
		'observacion'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}
}
