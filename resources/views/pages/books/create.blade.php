@php
    $options = [];
    foreach ($autores as $autor) {
        $options[] = (object) [
            'value' => $autor->id,
            'name' => $autor->nombre
        ];
    }
@endphp

<x-layouts.content>
    <x-form.form
        routestr='books.store'
        method="POST"    
    >
        <x-form.input
            label="Título"
            name="titulo"
            placeholder="Título del libro"
        />
        <x-form.input
            label="Ubicación"
            name="ubicacion"
            placeholder="Ubicación física del libro"
        />
        <x-form.input
            label="Cantidad de ejemplares"
            name="cantidad_de_ejemplares"
            placeholder="Cantidad de ejemplares"
            type="number"
        />
        <x-form.select
            label="Autor"
            name="autor"
            :options="$options"
        />
    </x-form.form>
    
</x-layouts.content>