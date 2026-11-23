<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialController extends Controller
{
    private $unidades = ['metro', 'metro cuadrado', 'kilogramo', 'galon', 'unidad', 'caja'];

    private $mensajes = [
        'required' => 'El campo :attribute es obligatorio.',
        'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
        'numeric' => 'El campo :attribute debe ser un numero.',
        'min' => 'El campo :attribute no puede ser menor que :min.',
        'unique' => 'Ya existe un material con ese nombre.',
        'in' => 'El valor elegido en :attribute no es valido.',
    ];

    private $nombres = [
        'nombre_material' => 'nombre',
        'descripcion' => 'descripcion',
        'unidad_medida' => 'unidad de medida',
        'stock_actual' => 'stock actual',
        'stock_minimo' => 'stock minimo',
        'estado' => 'estado',
    ];

    public function index()
    {
        $materiales = Material::orderBy('nombre_material')->get();

        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        $unidades = $this->unidades;

        return view('materiales.create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_material' => ['required', 'string', 'max:150', 'unique:material,nombre_material'],
            'descripcion' => ['nullable', 'string', 'max:200'],
            'unidad_medida' => ['required', Rule::in($this->unidades)],
            'stock_actual' => ['required', 'numeric', 'min:0'],
            'stock_minimo' => ['required', 'numeric', 'min:0'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ], $this->mensajes, $this->nombres);

        Material::create($datos);

        return redirect()->route('materiales.index')
            ->with('exito', 'Material registrado correctamente.');
    }

    public function edit(Material $material)
    {
        $unidades = $this->unidades;

        return view('materiales.edit', compact('material', 'unidades'));
    }

    public function update(Request $request, Material $material)
    {
        $datos = $request->validate([
            'nombre_material' => ['required', 'string', 'max:150',
                Rule::unique('material', 'nombre_material')->ignore($material->id_material, 'id_material')],
            'descripcion' => ['nullable', 'string', 'max:200'],
            'unidad_medida' => ['required', Rule::in($this->unidades)],
            'stock_minimo' => ['required', 'numeric', 'min:0'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ], $this->mensajes, $this->nombres);

        $material->update($datos);

        return redirect()->route('materiales.index')
            ->with('exito', 'Material actualizado correctamente.');
    }

    public function destroy(Material $material)
    {
        try {
            $material->delete();
        } catch (QueryException $e) {
            return redirect()->route('materiales.index')
                ->with('error', 'No se puede eliminar este material porque tiene movimientos o pedidos asociados. Puedes cambiar su estado a Inactivo.');
        }

        return redirect()->route('materiales.index')
            ->with('exito', 'Material eliminado correctamente.');
    }
}
