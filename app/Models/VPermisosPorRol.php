<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VPermisosPorRol
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * @property int $id_permiso
 * @property string $nombre_permiso
 * @property string|null $descripcion_permiso
 * @property Carbon $fecha_asignacion
 *
 * @package App\Models
 */
class VPermisosPorRol extends Model
{
	protected $table = 'v_permisos_por_rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int',
		'id_permiso' => 'int',
		'fecha_asignacion' => 'datetime'
	];

	protected $fillable = [
		'id_rol',
		'nombre_rol',
		'id_permiso',
		'nombre_permiso',
		'descripcion_permiso',
		'fecha_asignacion'
	];
}
