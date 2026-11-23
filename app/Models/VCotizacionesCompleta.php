<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VCotizacionesCompleta
 * 
 * @property int $id_cotizacion
 * @property Carbon $fecha_cotizacion
 * @property int $id_cliente
 * @property string|null $cliente
 * @property string $documento_cliente
 * @property string $tipo_cliente
 * @property string|null $empleado
 * @property string $cargo
 * @property string|null $descripcion
 * @property float $valor_total
 * @property string $estado_cotizacion
 *
 * @package App\Models
 */
class VCotizacionesCompleta extends Model
{
	protected $table = 'v_cotizaciones_completas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_cotizacion' => 'int',
		'fecha_cotizacion' => 'datetime',
		'id_cliente' => 'int',
		'valor_total' => 'float'
	];

	protected $fillable = [
		'id_cotizacion',
		'fecha_cotizacion',
		'id_cliente',
		'cliente',
		'documento_cliente',
		'tipo_cliente',
		'empleado',
		'cargo',
		'descripcion',
		'valor_total',
		'estado_cotizacion'
	];
}
