<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use illuminate\database\QueryException;
use illuminate\validation\rule;

class MaterialController extends Controller
{
    private $unidades = [
        'metro',
        'metro_cuadrado',
        'kilogramo',
        'galon',
        'unidad',
        'caja'
    ];

    private $mensajes = [
        'required' => 'El campo :attribute es obligatorio.',
        'string' => 'El campo :attribute debe ser una cadena de texto.',
        'max' => 'El campo :attribute no debe exceder :max caracteres.',
        'unique' => 'El valor del campo :attribute ya está en uso.',
        'in' => 'El valor del campo :attribute no es válido.',
    ];

    private $nombresAtributos = [
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
        return view ('materiales.index', compact('materiales'));
    }

    public function create()
    {
        $unidades = $this->unidades;
        return view('materiales.create', compact('unidades'));
    }

    public function store(Request $request) {
        $datos = $request->validate([
            'nombre_material' => ['required', 'string', 'max:255', 'unique:materiales,nombre_material'],
            'descripcion' => ['nullable', 'string'],
            'unidad_medida' => ['required', Rule::in($this->unidades)],
            'stock_actual' => ['required', 'numeric', 'min:0'],
            'stock_minimo' => ['required', 'numeric', 'min:0'],
            'estado' => ['required', 'in:activo,inactivo']
        ], $this->mensajes, $this->nombresAtributos);

        $material = Material::create($datos);

        return redirect()->route('materiales.index')->with('success', 'Material creado exitosamente.');

    }

    public function edit(Material $material)
    {
        $unidades = $this->unidades;
        return view('materiales.edit', compact('material', 'unidades'));
    }

    public function update(Request $request, Material $material)
    {
        $datos = $request->validate([
            'nombre_material' => ['required', 'string', 'max:255', Rule::unique('materiales')->ignore($material->id)],
            'descripcion' => ['nullable', 'string'],
            'unidad_medida' => ['required', Rule::in($this->unidades)],
            'stock_actual' => ['required', 'numeric', 'min:0'],
            'stock_minimo' => ['required', 'numeric', 'min:0'],
            'estado' => ['required', 'in:activo,inactivo']
        ], $this->mensajes, $this->nombresAtributos);

        $material->update($datos);

        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        try {
            $material->delete();
            return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente.');
        } catch (QueryException $e) {
            return redirect()->route('materiales.index')->with('error', 'No se puede eliminar el material porque está asociado a otros registros. Puede cambiar su estado a inactivo.');
        }
    }
}
