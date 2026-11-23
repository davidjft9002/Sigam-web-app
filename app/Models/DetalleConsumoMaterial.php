<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleConsumoMaterial
 * 
 * @property int $id_orden_produccion
 * @property int $id_material
 * @property float $cantidad_consumida
 * @property Carbon $fecha_consumo
 * 
 * @property Material $material
 * @property OrdenProduccion $orden_produccion
 *
 * @package App\Models
 */
class DetalleConsumoMaterial extends Model
{
	protected $table = 'detalle_consumo_material';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_orden_produccion' => 'int',
		'id_material' => 'int',
		'cantidad_consumida' => 'float',
		'fecha_consumo' => 'datetime'
	];

	protected $fillable = [
		'cantidad_consumida',
		'fecha_consumo'
	];

	public function material()
	{
		return $this->belongsTo(Material::class, 'id_material');
	}

	public function orden_produccion()
	{
		return $this->belongsTo(OrdenProduccion::class, 'id_orden_produccion');
	}
}
