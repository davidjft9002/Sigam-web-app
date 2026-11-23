<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    private $mensajes = [
        'required' => 'El campo :attribute es obligatorio.',
        'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
        'email' => 'El :attribute no tiene un formato valido.',
        'unique' => 'Ya existe una persona registrada con ese numero de documento.',
        'in' => 'El valor elegido en :attribute no es valido.',
    ];

    private $nombres = [
        'tipo_documento' => 'tipo de documento',
        'numero_documento' => 'numero de documento',
        'nombres' => 'nombres',
        'apellidos' => 'apellidos',
        'telefono' => 'telefono',
        'correo' => 'correo',
        'direccion' => 'direccion',
        'tipo_cliente' => 'tipo de cliente',
        'estado' => 'estado',
    ];

    private function reglas($idPersona = null)
    {
        return [
            'tipo_documento' => ['required', 'in:CC,NIT,CE,Pasaporte'],
            'numero_documento' => ['required', 'max:20',
                Rule::unique('persona', 'numero_documento')->ignore($idPersona, 'id_persona')],
            'nombres' => ['required', 'max:100'],
            'apellidos' => ['required', 'max:100'],
            'telefono' => ['nullable', 'max:20'],
            'correo' => ['nullable', 'email', 'max:120'],
            'direccion' => ['nullable', 'max:200'],
            'tipo_cliente' => ['required', 'in:Persona,Empresa'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ];
    }

    public function index()
    {
        $clientes = Cliente::with('persona')->get()->sortBy('persona.nombres');

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes, $this->nombres);

        DB::transaction(function () use ($datos) {
            $persona = Persona::create($datos);

            $persona->cliente()->create([
                'fecha_registro' => now()->toDateString(),
                'tipo_cliente' => $datos['tipo_cliente'],
                'estado' => $datos['estado'],
            ]);
        });

        return redirect()->route('clientes.index')
            ->with('exito', 'Cliente registrado correctamente.');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $datos = $request->validate($this->reglas($cliente->id_persona), $this->mensajes, $this->nombres);

        DB::transaction(function () use ($cliente, $datos) {
            $cliente->persona->update($datos);

            $cliente->update([
                'tipo_cliente' => $datos['tipo_cliente'],
                'estado' => $datos['estado'],
            ]);
        });

        return redirect()->route('clientes.index')
            ->with('exito', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        try {
            DB::transaction(function () use ($cliente) {
                $persona = $cliente->persona;
                $cliente->delete();

                if (! $persona->empleado) {
                    $persona->delete();
                }
            });
        } catch (QueryException $e) {
            return redirect()->route('clientes.index')
                ->with('error', 'No se puede eliminar este cliente porque tiene cotizaciones asociadas. Puedes cambiar su estado a Inactivo.');
        }

        return redirect()->route('clientes.index')
            ->with('exito', 'Cliente eliminado correctamente.');
    }
}
