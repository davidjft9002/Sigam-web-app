<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TrazabilidadProduccion
 * 
 * @property int $id_trazabilidad
 * @property int $id_orden_produccion
 * @property int $id_usuario
 * @property Carbon $fecha_evento
 * @property string $actividad
 * @property string|null $observacion
 * 
 * @property OrdenProduccion $orden_produccion
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class TrazabilidadProduccion extends Model
{
	protected $table = 'trazabilidad_produccion';
	protected $primaryKey = 'id_trazabilidad';
	public $timestamps = false;

	protected $casts = [
		'id_orden_produccion' => 'int',
		'id_usuario' => 'int',
		'fecha_evento' => 'datetime'
	];

	protected $fillable = [
		'id_orden_produccion',
		'id_usuario',
		'fecha_evento',
		'actividad',
		'observacion'
	];

	public function orden_produccion()
	{
		return $this->belongsTo(OrdenProduccion::class, 'id_orden_produccion');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
