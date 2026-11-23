<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VAuditoriaDetallada
 * 
 * @property int $id_auditoria
 * @property Carbon $fecha_evento
 * @property string $nombre_usuario
 * @property string|null $empleado
 * @property string $accion
 * @property string $tabla_afectada
 * @property int|null $registro_afectado
 *
 * @package App\Models
 */
class VAuditoriaDetallada extends Model
{
	protected $table = 'v_auditoria_detallada';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_auditoria' => 'int',
		'fecha_evento' => 'datetime',
		'registro_afectado' => 'int'
	];

	protected $fillable = [
		'id_auditoria',
		'fecha_evento',
		'nombre_usuario',
		'empleado',
		'accion',
		'tabla_afectada',
		'registro_afectado'
	];
}
