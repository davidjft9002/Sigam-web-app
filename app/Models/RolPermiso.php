<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolPermiso
 * 
 * @property int $id_rol
 * @property int $id_permiso
 * @property Carbon $fecha_asignacion
 * 
 * @property Permiso $permiso
 * @property Rol $rol
 *
 * @package App\Models
 */
class RolPermiso extends Model
{
	protected $table = 'rol_permiso';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int',
		'id_permiso' => 'int',
		'fecha_asignacion' => 'datetime'
	];

	protected $fillable = [
		'fecha_asignacion'
	];

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'id_permiso');
	}

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}
}
