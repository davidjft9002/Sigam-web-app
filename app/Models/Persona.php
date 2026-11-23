<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 * 
 * @property int $id_persona
 * @property string $tipo_documento
 * @property string $numero_documento
 * @property string $nombres
 * @property string $apellidos
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * 
 * @property Cliente|null $cliente
 * @property Empleado|null $empleado
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'persona';
	protected $primaryKey = 'id_persona';
	public $timestamps = false;

	protected $fillable = [
		'tipo_documento',
		'numero_documento',
		'nombres',
		'apellidos',
		'telefono',
		'correo',
		'direccion'
	];

	public function cliente()
	{
		return $this->hasOne(Cliente::class, 'id_persona');
	}

	public function empleado()
	{
		return $this->hasOne(Empleado::class, 'id_persona');
	}
}
