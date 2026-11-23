<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VAlertasStockMinimo
 * 
 * @property int $id_material
 * @property string $nombre_material
 * @property string $unidad_medida
 * @property float $stock_actual
 * @property float $stock_minimo
 * @property float $cantidad_faltante
 *
 * @package App\Models
 */
class VAlertasStockMinimo extends Model
{
	protected $table = 'v_alertas_stock_minimo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_material' => 'int',
		'stock_actual' => 'float',
		'stock_minimo' => 'float',
		'cantidad_faltante' => 'float'
	];

	protected $fillable = [
		'id_material',
		'nombre_material',
		'unidad_medida',
		'stock_actual',
		'stock_minimo',
		'cantidad_faltante'
	];
}
