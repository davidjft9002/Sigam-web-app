<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VPedidosCompleto
 * 
 * @property int $id_pedido
 * @property int $id_cotizacion
 * @property Carbon $fecha_pedido
 * @property Carbon $fecha_entrega
 * @property string|null $cliente
 * @property string|null $telefono_cliente
 * @property string|null $responsable_pedido
 * @property string|null $descripcion_pedido
 * @property float $valor_total
 * @property string $estado_pedido
 *
 * @package App\Models
 */
class VPedidosCompleto extends Model
{
	protected $table = 'v_pedidos_completos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'id_cotizacion' => 'int',
		'fecha_pedido' => 'datetime',
		'fecha_entrega' => 'datetime',
		'valor_total' => 'float'
	];

	protected $fillable = [
		'id_pedido',
		'id_cotizacion',
		'fecha_pedido',
		'fecha_entrega',
		'cliente',
		'telefono_cliente',
		'responsable_pedido',
		'descripcion_pedido',
		'valor_total',
		'estado_pedido'
	];
}
