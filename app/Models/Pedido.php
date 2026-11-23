<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $id_pedido
 * @property int $id_cotizacion
 * @property int $id_usuario
 * @property Carbon $fecha_pedido
 * @property Carbon $fecha_entrega
 * @property string $estado_pedido
 * @property string|null $descripcion_pedido
 * 
 * @property Cotizacion $cotizacion
 * @property Usuario $usuario
 * @property Collection|Material[] $materials
 * @property Collection|HistorialEstadoPedido[] $historial_estado_pedidos
 * @property Collection|OrdenProduccion[] $orden_produccions
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	protected $primaryKey = 'id_pedido';
	public $timestamps = false;

	protected $casts = [
		'id_cotizacion' => 'int',
		'id_usuario' => 'int',
		'fecha_pedido' => 'datetime',
		'fecha_entrega' => 'datetime'
	];

	protected $fillable = [
		'id_cotizacion',
		'id_usuario',
		'fecha_pedido',
		'fecha_entrega',
		'estado_pedido',
		'descripcion_pedido'
	];

	public function cotizacion()
	{
		return $this->belongsTo(Cotizacion::class, 'id_cotizacion');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function materials()
	{
		return $this->belongsToMany(Material::class, 'detalle_pedido_material', 'id_pedido', 'id_material')
					->withPivot('cantidad_requerida', 'observacion');
	}

	public function historial_estado_pedidos()
	{
		return $this->hasMany(HistorialEstadoPedido::class, 'id_pedido');
	}

	public function orden_produccions()
	{
		return $this->hasMany(OrdenProduccion::class, 'id_pedido');
	}
}
