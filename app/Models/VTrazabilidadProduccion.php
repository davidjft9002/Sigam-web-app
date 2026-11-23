<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VTrazabilidadProduccion
 * 
 * @property int $id_trazabilidad
 * @property int $id_orden_produccion
 * @property string $estado_orden
 * @property Carbon $fecha_evento
 * @property string $actividad
 * @property string|null $registrado_por
 * @property string|null $observacion
 *
 * @package App\Models
 */
class VTrazabilidadProduccion extends Model
{
	protected $table = 'v_trazabilidad_produccion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_trazabilidad' => 'int',
		'id_orden_produccion' => 'int',
		'fecha_evento' => 'datetime'
	];

	protected $fillable = [
		'id_trazabilidad',
		'id_orden_produccion',
		'estado_orden',
		'fecha_evento',
		'actividad',
		'registrado_por',
		'observacion'
	];
}
