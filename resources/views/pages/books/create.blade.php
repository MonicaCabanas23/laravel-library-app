@php
    $options = [];
    foreach ($autores as $autor) {
        array_push($options, $autor->nombre);
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
        <!-- TODO: make the dropdown dinamic -->
        <x-form.dropdown
            label="Autor"
            name="autor"
            placeholder="Seleccione un autor"
            :options="$options"
        />
    </x-form.form>
</x-layouts.content>