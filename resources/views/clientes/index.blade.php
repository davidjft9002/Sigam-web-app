<x-layouts.app :title="'Clientes'">
    <div class="flex flex-col gap-4">

        <div class="flex items-center justify-between">
            <flux:heading size="xl">Clientes</flux:heading>
            <flux:button variant="primary" icon="plus" :href="route('clientes.create')">
                Nuevo cliente
            </flux:button>
        </div>

        @if (session('exito'))
            <div class="rounded-lg border border-green-300 bg-green-50 p-3 text-green-800 dark:border-green-700 dark:bg-green-900/30 dark:text-green-300">
                {{ session('exito') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-lg border border-red-300 bg-red-50 p-3 text-red-800 dark:border-red-700 dark:bg-red-900/30 dark:text-red-300">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-zinc-200 dark:border-zinc-700">
            <table class="w-full text-left text-sm">
                <thead class="bg-zinc-100 dark:bg-zinc-900">
                    <tr>
                        <th class="p-3">Cliente</th>
                        <th class="p-3">Documento</th>
                        <th class="p-3">Contacto</th>
                        <th class="p-3">Tipo</th>
                        <th class="p-3">Registro</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr class="border-t border-zinc-200 dark:border-zinc-700">
                            <td class="p-3">
                                <div class="font-medium">{{ $cliente->persona->nombres }} {{ $cliente->persona->apellidos }}</div>
                                <div class="text-xs text-zinc-500">{{ $cliente->persona->direccion }}</div>
                            </td>
                            <td class="p-3">{{ $cliente->persona->tipo_documento }} {{ $cliente->persona->numero_documento }}</td>
                            <td class="p-3">
                                <div>{{ $cliente->persona->telefono }}</div>
                                <div class="text-xs text-zinc-500">{{ $cliente->persona->correo }}</div>
                            </td>
                            <td class="p-3">{{ $cliente->tipo_cliente }}</td>
                            <td class="p-3">{{ $cliente->fecha_registro->format('d/m/Y') }}</td>
                            <td class="p-3">
                                <flux:badge size="sm" :color="$cliente->estado == 'Activo' ? 'green' : 'zinc'">
                                    {{ $cliente->estado }}
                                </flux:badge>
                            </td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <flux:button size="sm" icon="pencil-square" :href="route('clientes.edit', $cliente)">
                                        Editar
                                    </flux:button>

                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                        @csrf
                                        @method('DELETE')
                                        <flux:button size="sm" variant="danger" icon="trash" type="submit">
                                            Eliminar
                                        </flux:button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-center text-zinc-500">No hay clientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>