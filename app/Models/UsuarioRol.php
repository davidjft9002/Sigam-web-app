<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioRol
 * 
 * @property int $id_usuario
 * @property int $id_rol
 * @property Carbon $fecha_asignacion
 * @property string $estado
 * 
 * @property Rol $rol
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class UsuarioRol extends Model
{
	protected $table = 'usuario_rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_rol' => 'int',
		'fecha_asignacion' => 'datetime'
	];

	protected $fillable = [
		'fecha_asignacion',
		'estado'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
