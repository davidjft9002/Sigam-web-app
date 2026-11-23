<x-layouts.app :title="'Editar material'">
    <div class="flex max-w-xl flex-col gap-4">
        <flux:heading size="xl">Editar material</flux:heading>

        <flux:text>
            Stock actual: <strong>{{ $material->stock_actual }} {{ $material->unidad_medida }}</strong>.
            El stock cambia con los movimientos de inventario, no desde aqui.
        </flux:text>

        <form action="{{ route('materiales.update', $material) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            @include('materiales._campos')

            <div class="flex gap-2">
                <flux:button variant="primary" type="submit">Guardar cambios</flux:button>
                <flux:button :href="route('materiales.index')">Cancelar</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>