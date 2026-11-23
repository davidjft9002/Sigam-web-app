<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * @property string|null $descripcion_rol
 * @property string $estado
 * 
 * @property Collection|Permiso[] $permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'id_rol';
	public $timestamps = false;

	protected $fillable = [
		'nombre_rol',
		'descripcion_rol',
		'estado'
	];

	public function permisos()
	{
		return $this->belongsToMany(Permiso::class, 'rol_permiso', 'id_rol', 'id_permiso')
					->withPivot('fecha_asignacion');
	}

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'usuario_rol', 'id_rol', 'id_usuario')
					->withPivot('fecha_asignacion', 'estado');
	}
}
