<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VUsuariosRole
 * 
 * @property int $id_usuario
 * @property string $nombre_usuario
 * @property string|null $empleado
 * @property string $cargo
 * @property string $nombre_rol
 * @property Carbon $fecha_asignacion
 * @property string $estado_asignacion
 * @property string $estado_usuario
 * @property Carbon|null $ultimo_acceso
 *
 * @package App\Models
 */
class VUsuariosRole extends Model
{
	protected $table = 'v_usuarios_roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'fecha_asignacion' => 'datetime',
		'ultimo_acceso' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'nombre_usuario',
		'empleado',
		'cargo',
		'nombre_rol',
		'fecha_asignacion',
		'estado_asignacion',
		'estado_usuario',
		'ultimo_acceso'
	];
}
