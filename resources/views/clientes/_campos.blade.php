<div class="grid gap-4 sm:grid-cols-2">
    <flux:select name="tipo_documento" label="Tipo de documento">
        @foreach (['CC', 'NIT', 'CE', 'Pasaporte'] as $tipo)
            <option value="{{ $tipo }}" @selected(old('tipo_documento', $cliente->persona->tipo_documento ?? 'CC') == $tipo)>
                {{ $tipo }}
            </option>
        @endforeach
    </flux:select>

    <flux:input name="numero_documento" label="Numero de documento"
                :value="old('numero_documento', $cliente->persona->numero_documento ?? '')" />

    <flux:input name="nombres" label="Nombres o razon social"
                :value="old('nombres', $cliente->persona->nombres ?? '')" />

    <flux:input name="apellidos" label="Apellidos o tipo de sociedad"
                :value="old('apellidos', $cliente->persona->apellidos ?? '')" />

    <flux:input name="telefono" label="Telefono"
                :value="old('telefono', $cliente->persona->telefono ?? '')" />

    <flux:input type="email" name="correo" label="Correo"
                :value="old('correo', $cliente->persona->correo ?? '')" />
</div>

<flux:input name="direccion" label="Direccion"
            :value="old('direccion', $cliente->persona->direccion ?? '')" />

<div class="grid gap-4 sm:grid-cols-2">
    <flux:select name="tipo_cliente" label="Tipo de cliente">
        <option value="Persona" @selected(old('tipo_cliente', $cliente->tipo_cliente ?? 'Persona') == 'Persona')>Persona</option>
        <option value="Empresa" @selected(old('tipo_cliente', $cliente->tipo_cliente ?? '') == 'Empresa')>Empresa</option>
    </flux:select>

    <flux:select name="estado" label="Estado">
        <option value="Activo" @selected(old('estado', $cliente->estado ?? 'Activo') == 'Activo')>Activo</option>
        <option value="Inactivo" @selected(old('estado', $cliente->estado ?? '') == 'Inactivo')>Inactivo</option>
    </flux:select>
</div>