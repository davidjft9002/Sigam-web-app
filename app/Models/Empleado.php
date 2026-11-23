<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property int $id_persona
 * @property string $cargo
 * @property Carbon $fecha_ingreso
 * @property string $estado_empleado
 * 
 * @property Persona $persona
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleado';
	protected $primaryKey = 'id_persona';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_persona' => 'int',
		'fecha_ingreso' => 'datetime'
	];

	protected $fillable = [
		'cargo',
		'fecha_ingreso',
		'estado_empleado'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'id_persona');
	}

	public function usuario()
	{
		return $this->hasOne(Usuario::class, 'id_empleado');
	}
}
