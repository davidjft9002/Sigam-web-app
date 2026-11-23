<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VCargaPorOperario
 * 
 * @property string|null $operario
 * @property int $total_ordenes
 * @property float|null $pendientes
 * @property float|null $en_proceso
 * @property float|null $finalizadas
 * @property float|null $promedio_dias_fabricacion
 *
 * @package App\Models
 */
class VCargaPorOperario extends Model
{
	protected $table = 'v_carga_por_operario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_ordenes' => 'int',
		'pendientes' => 'float',
		'en_proceso' => 'float',
		'finalizadas' => 'float',
		'promedio_dias_fabricacion' => 'float'
	];

	protected $fillable = [
		'operario',
		'total_ordenes',
		'pendientes',
		'en_proceso',
		'finalizadas',
		'promedio_dias_fabricacion'
	];
}
