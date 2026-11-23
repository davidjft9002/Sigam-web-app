<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VMovimientosInventario
 * 
 * @property int $id_movimiento
 * @property Carbon $fecha_movimiento
 * @property string $nombre_material
 * @property string $unidad_medida
 * @property string $tipo_movimiento
 * @property float $cantidad
 * @property string|null $motivo
 * @property int|null $id_orden_produccion
 * @property string|null $registrado_por
 *
 * @package App\Models
 */
class VMovimientosInventario extends Model
{
	protected $table = 'v_movimientos_inventario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_movimiento' => 'int',
		'fecha_movimiento' => 'datetime',
		'cantidad' => 'float',
		'id_orden_produccion' => 'int'
	];

	protected $fillable = [
		'id_movimiento',
		'fecha_movimiento',
		'nombre_material',
		'unidad_medida',
		'tipo_movimiento',
		'cantidad',
		'motivo',
		'id_orden_produccion',
		'registrado_por'
	];
}
