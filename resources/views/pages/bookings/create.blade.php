@php
    $options = [];
    foreach ($copies as $copy) {
        $options[] = (object) [
            'value' => $copy->id,
            'name' => 'Ejemplar ' . $copy->id
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
            label="Ejemplar"
            name="copy_id"
            :options="$options"
        />
    </x-form.form>
</x-layouts.content>