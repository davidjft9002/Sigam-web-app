<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MovimientoInventario
 * 
 * @property int $id_movimiento
 * @property int $id_material
 * @property int $id_usuario
 * @property int|null $id_orden_produccion
 * @property string $tipo_movimiento
 * @property float $cantidad
 * @property Carbon $fecha_movimiento
 * @property string|null $motivo
 * 
 * @property Material $material
 * @property OrdenProduccion|null $orden_produccion
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class MovimientoInventario extends Model
{
	protected $table = 'movimiento_inventario';
	protected $primaryKey = 'id_movimiento';
	public $timestamps = false;

	protected $casts = [
		'id_material' => 'int',
		'id_usuario' => 'int',
		'id_orden_produccion' => 'int',
		'cantidad' => 'float',
		'fecha_movimiento' => 'datetime'
	];

	protected $fillable = [
		'id_material',
		'id_usuario',
		'id_orden_produccion',
		'tipo_movimiento',
		'cantidad',
		'fecha_movimiento',
		'motivo'
	];

	public function material()
	{
		return $this->belongsTo(Material::class, 'id_material');
	}

	public function orden_produccion()
	{
		return $this->belongsTo(OrdenProduccion::class, 'id_orden_produccion');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
