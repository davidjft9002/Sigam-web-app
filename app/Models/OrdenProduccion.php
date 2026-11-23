<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdenProduccion
 * 
 * @property int $id_orden_produccion
 * @property int $id_pedido
 * @property int $id_usuario
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property string $estado_orden
 * @property string|null $observaciones
 * 
 * @property Pedido $pedido
 * @property Usuario $usuario
 * @property Collection|DetalleConsumoMaterial[] $detalle_consumo_materials
 * @property Collection|MovimientoInventario[] $movimiento_inventarios
 * @property Collection|TrazabilidadProduccion[] $trazabilidad_produccions
 *
 * @package App\Models
 */
class OrdenProduccion extends Model
{
	protected $table = 'orden_produccion';
	protected $primaryKey = 'id_orden_produccion';
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'id_usuario' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'id_pedido',
		'id_usuario',
		'fecha_inicio',
		'fecha_fin',
		'estado_orden',
		'observaciones'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function detalle_consumo_materials()
	{
		return $this->hasMany(DetalleConsumoMaterial::class, 'id_orden_produccion');
	}

	public function movimiento_inventarios()
	{
		return $this->hasMany(MovimientoInventario::class, 'id_orden_produccion');
	}

	public function trazabilidad_produccions()
	{
		return $this->hasMany(TrazabilidadProduccion::class, 'id_orden_produccion');
	}
}
