<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property int $id_empleado
 * @property string $nombre_usuario
 * @property string $contrasena
 * @property string $estado_usuario
 * @property Carbon|null $ultimo_acceso
 * 
 * @property Empleado $empleado
 * @property Collection|Auditorium[] $auditoria
 * @property Collection|Cotizacion[] $cotizacions
 * @property Collection|MovimientoInventario[] $movimiento_inventarios
 * @property Collection|OrdenProduccion[] $orden_produccions
 * @property Collection|Pedido[] $pedidos
 * @property Collection|TrazabilidadProduccion[] $trazabilidad_produccions
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'id_empleado' => 'int',
		'ultimo_acceso' => 'datetime'
	];

	protected $fillable = [
		'id_empleado',
		'nombre_usuario',
		'contrasena',
		'estado_usuario',
		'ultimo_acceso'
	];

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'id_empleado');
	}

	public function auditoria()
	{
		return $this->hasMany(Auditorium::class, 'id_usuario');
	}

	public function cotizacions()
	{
		return $this->hasMany(Cotizacion::class, 'id_usuario');
	}

	public function movimiento_inventarios()
	{
		return $this->hasMany(MovimientoInventario::class, 'id_usuario');
	}

	public function orden_produccions()
	{
		return $this->hasMany(OrdenProduccion::class, 'id_usuario');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_usuario');
	}

	public function trazabilidad_produccions()
	{
		return $this->hasMany(TrazabilidadProduccion::class, 'id_usuario');
	}

	public function rols()
	{
		return $this->belongsToMany(Rol::class, 'usuario_rol', 'id_usuario', 'id_rol')
					->withPivot('fecha_asignacion', 'estado');
	}
}
