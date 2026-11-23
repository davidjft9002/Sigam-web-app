<x-layouts.app :title="'Editar cliente'">
    <div class="flex max-w-2xl flex-col gap-4">
        <flux:heading size="xl">Editar cliente</flux:heading>

        <flux:text>
            Cliente registrado el <strong>{{ $cliente->fecha_registro->format('d/m/Y') }}</strong>.
        </flux:text>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            @include('clientes._campos')

            <div class="flex gap-2">
                <flux:button variant="primary" type="submit">Guardar cambios</flux:button>
                <flux:button :href="route('clientes.index')">Cancelar</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>