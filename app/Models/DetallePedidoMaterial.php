<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallePedidoMaterial
 * 
 * @property int $id_pedido
 * @property int $id_material
 * @property float $cantidad_requerida
 * @property string|null $observacion
 * 
 * @property Material $material
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class DetallePedidoMaterial extends Model
{
	protected $table = 'detalle_pedido_material';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'id_material' => 'int',
		'cantidad_requerida' => 'float'
	];

	protected $fillable = [
		'cantidad_requerida',
		'observacion'
	];

	public function material()
	{
		return $this->belongsTo(Material::class, 'id_material');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}
}
