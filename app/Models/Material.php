<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 * 
 * @property int $id_material
 * @property string $nombre_material
 * @property string|null $descripcion
 * @property string $unidad_medida
 * @property float $stock_actual
 * @property float $stock_minimo
 * @property string $estado
 * 
 * @property Collection|DetalleConsumoMaterial[] $detalle_consumo_materials
 * @property Collection|Pedido[] $pedidos
 * @property Collection|MovimientoInventario[] $movimiento_inventarios
 *
 * @package App\Models
 */
class Material extends Model
{
	protected $table = 'material';
	protected $primaryKey = 'id_material';
	public $timestamps = false;

	protected $casts = [
		'stock_actual' => 'float',
		'stock_minimo' => 'float'
	];

	protected $fillable = [
		'nombre_material',
		'descripcion',
		'unidad_medida',
		'stock_actual',
		'stock_minimo',
		'estado'
	];

	public function detalle_consumo_materials()
	{
		return $this->hasMany(DetalleConsumoMaterial::class, 'id_material');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'detalle_pedido_material', 'id_material', 'id_pedido')
					->withPivot('cantidad_requerida', 'observacion');
	}

	public function movimiento_inventarios()
	{
		return $this->hasMany(MovimientoInventario::class, 'id_material');
	}
}
