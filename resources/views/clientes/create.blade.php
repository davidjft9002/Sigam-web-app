<x-layouts.app :title="'Nuevo cliente'">
    <div class="flex max-w-2xl flex-col gap-4">
        <flux:heading size="xl">Nuevo cliente</flux:heading>

        <form action="{{ route('clientes.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            @include('clientes._campos')

            <div class="flex gap-2">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
                <flux:button :href="route('clientes.index')">Cancelar</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>