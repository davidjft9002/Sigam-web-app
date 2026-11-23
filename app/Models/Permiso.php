<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $id_permiso
 * @property string $nombre_permiso
 * @property string|null $descripcion_permiso
 * @property string $estado
 * 
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permiso';
	protected $primaryKey = 'id_permiso';
	public $timestamps = false;

	protected $fillable = [
		'nombre_permiso',
		'descripcion_permiso',
		'estado'
	];

	public function rols()
	{
		return $this->belongsToMany(Rol::class, 'rol_permiso', 'id_permiso', 'id_rol')
					->withPivot('fecha_asignacion');
	}
}
