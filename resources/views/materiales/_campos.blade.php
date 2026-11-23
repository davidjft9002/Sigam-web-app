<flux:input name="nombre_material" label="Nombre del material"
            :value="old('nombre_material', $material->nombre_material ?? '')" />

<flux:textarea name="descripcion" label="Descripcion (opcional)" rows="2">{{ old('descripcion', $material->descripcion ?? '') }}</flux:textarea>

<flux:select name="unidad_medida" label="Unidad de medida">
    <option value="">Seleccione...</option>
    @foreach ($unidades as $unidad)
        <option value="{{ $unidad }}" @selected(old('unidad_medida', $material->unidad_medida ?? '') == $unidad)>
            {{ $unidad }}
        </option>
    @endforeach
</flux:select>

@if (! isset($material))
    <flux:input type="number" step="0.01" name="stock_actual" label="Stock inicial"
                :value="old('stock_actual', 0)" />
@endif

<flux:input type="number" step="0.01" name="stock_minimo" label="Stock minimo"
            :value="old('stock_minimo', $material->stock_minimo ?? 0)" />

<flux:select name="estado" label="Estado">
    <option value="Activo" @selected(old('estado', $material->estado ?? 'Activo') == 'Activo')>Activo</option>
    <option value="Inactivo" @selected(old('estado', $material->estado ?? '') == 'Inactivo')>Inactivo</option>
</flux:select>