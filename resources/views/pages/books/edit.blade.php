@php
    $options = [];
    foreach ($autores as $author) {
        array_push($options, $author->nombre);
    }
@endphp

<x-layouts.content>
    <x-form.form
        routestr='books.update'    
        params="{{ $libro->id }}"
        method="PUT"
    >
        <x-form.input
            value="{{ $libro->titulo }}"
            label="Título"
            name="titulo"
            placeholder="Título del libro"
        />
        <x-form.input
            value="{{ $libro->ubicacion}}"
            label="Ubicación"
            name="ubicacion"
            placeholder="Ubicación física del libro"
        />
        <x-form.input
            value="{{ $libro->cantidad_de_ejemplares }}"
            label="Cantidad de ejemplares"
            name="cantidad_de_ejemplares"
            placeholder="Cantidad de ejemplares"
            type="number"
        />
        <x-form.input
            value="{{ $autor->nombre }}"
            label="Autor"
            name="autor"
            placeholder="Seleccione un autor"
            type="text"
        />
        <!-- TODO: make the dropdown dinamic -->
        <!-- <x-form.dropdown
            value="{{ $autor->nombre }}"
            label="Autor"
            name="autor"
            placeholder="Seleccione un autor"
            :options="$options"
        /> -->
    </x-form.form>

    <script>
        function cancel() {
            event.preventDefault()
            window.location.href = "/";
        }
    </script>

    <script>
        console.log(<?php echo json_encode($autor); ?>);
    </script>
</x-layouts.content>