<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cotizacion
 * 
 * @property int $id_cotizacion
 * @property int $id_cliente
 * @property int $id_usuario
 * @property Carbon $fecha_cotizacion
 * @property string|null $descripcion
 * @property float $valor_total
 * @property string $estado_cotizacion
 * 
 * @property Cliente $cliente
 * @property Usuario $usuario
 * @property Collection|DetalleCotizacion[] $detalle_cotizacions
 * @property Pedido|null $pedido
 *
 * @package App\Models
 */
class Cotizacion extends Model
{
	protected $table = 'cotizacion';
	protected $primaryKey = 'id_cotizacion';
	public $timestamps = false;

	protected $casts = [
		'id_cliente' => 'int',
		'id_usuario' => 'int',
		'fecha_cotizacion' => 'datetime',
		'valor_total' => 'float'
	];

	protected $fillable = [
		'id_cliente',
		'id_usuario',
		'fecha_cotizacion',
		'descripcion',
		'valor_total',
		'estado_cotizacion'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_cliente');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function detalle_cotizacions()
	{
		return $this->hasMany(DetalleCotizacion::class, 'id_cotizacion');
	}

	public function pedido()
	{
		return $this->hasOne(Pedido::class, 'id_cotizacion');
	}
}
