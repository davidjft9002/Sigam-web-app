<x-layouts.app :title="'Materiales'">
    <div class="flex flex-col gap-4">

        <div class="flex items-center justify-between">
            <flux:heading size="xl">Materiales</flux:heading>
            <flux:button variant="primary" icon="plus" :href="route('materiales.create')">
                Nuevo material
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
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Unidad</th>
                        <th class="p-3">Stock actual</th>
                        <th class="p-3">Stock minimo</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materiales as $material)
                        <tr class="border-t border-zinc-200 dark:border-zinc-700">
                            <td class="p-3">
                                <div class="font-medium">{{ $material->nombre_material }}</div>
                                <div class="text-xs text-zinc-500">{{ $material->descripcion }}</div>
                            </td>
                            <td class="p-3">{{ $material->unidad_medida }}</td>
                            <td class="p-3 {{ $material->stock_actual <= $material->stock_minimo ? 'font-bold text-red-600' : '' }}">
                                {{ $material->stock_actual }}
                            </td>
                            <td class="p-3">{{ $material->stock_minimo }}</td>
                            <td class="p-3">
                                <flux:badge size="sm" :color="$material->estado == 'Activo' ? 'green' : 'zinc'">
                                    {{ $material->estado }}
                                </flux:badge>
                            </td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <flux:button size="sm" icon="pencil-square" :href="route('materiales.edit', $material)">
                                        Editar
                                    </flux:button>

                                    <form action="{{ route('materiales.destroy', $material) }}" method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este material?')">
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
                            <td colspan="6" class="p-6 text-center text-zinc-500">No hay materiales registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>