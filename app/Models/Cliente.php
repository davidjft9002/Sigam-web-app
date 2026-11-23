<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id_persona
 * @property Carbon $fecha_registro
 * @property string $tipo_cliente
 * @property string $estado
 * 
 * @property Persona $persona
 * @property Collection|Cotizacion[] $cotizacions
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'id_persona';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_persona' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'fecha_registro',
		'tipo_cliente',
		'estado'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'id_persona');
	}

	public function cotizacions()
	{
		return $this->hasMany(Cotizacion::class, 'id_cliente');
	}
}
