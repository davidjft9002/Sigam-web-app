<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VVentasPorCategorium
 * 
 * @property string $categoria
 * @property int $cotizaciones_aprobadas
 * @property float|null $unidades_vendidas
 * @property float|null $valor_vendido
 *
 * @package App\Models
 */
class VVentasPorCategorium extends Model
{
	protected $table = 'v_ventas_por_categoria';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cotizaciones_aprobadas' => 'int',
		'unidades_vendidas' => 'float',
		'valor_vendido' => 'float'
	];

	protected $fillable = [
		'categoria',
		'cotizaciones_aprobadas',
		'unidades_vendidas',
		'valor_vendido'
	];
}
