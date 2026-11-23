<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Auditorium
 * 
 * @property int $id_auditoria
 * @property int $id_usuario
 * @property Carbon $fecha_evento
 * @property string $accion
 * @property string $tabla_afectada
 * @property int|null $registro_afectado
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Auditorium extends Model
{
	protected $table = 'auditoria';
	protected $primaryKey = 'id_auditoria';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'fecha_evento' => 'datetime',
		'registro_afectado' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'fecha_evento',
		'accion',
		'tabla_afectada',
		'registro_afectado'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
