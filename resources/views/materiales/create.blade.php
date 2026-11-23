<x-layouts.app :title="'Nuevo material'">
    <div class="flex max-w-xl flex-col gap-4">
        <flux:heading size="xl">Nuevo material</flux:heading>

        <form action="{{ route('materiales.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            @include('materiales._campos')

            <div class="flex gap-2">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
                <flux:button :href="route('materiales.index')">Cancelar</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>