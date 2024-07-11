@php
    $options = [];
    foreach ($copies as $ejemplar) {
        $options[] = (object) [
            'value' => $ejemplar->id,
            'name' => 'Ejemplar ' . $ejemplar->id
        ];
    }
@endphp

<x-layouts.content>
    <x-form.form
        routestr='bookings.store'
        method="POST"    
    >
        <x-form.input
            label="Nombre del solicitante"
            name="nombre"
            placeholder="Nombre del solicitante"
        />
        <x-form.select
            value="{{ $copy ? $copy->id : ''}}"
            label="Ejemplar"
            name="copy_id"
            :options="$options"
        />
    </x-form.form>
</x-layouts.content>