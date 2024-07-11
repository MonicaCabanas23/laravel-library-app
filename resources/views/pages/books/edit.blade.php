@php
    $options = [];
    foreach ($autores as $author) {
        $options[] = (object) [
            'value' => $author->id,
            'name' => $author->nombre
        ];
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
        <x-form.select
            value="{{ $libro->author_id }}"
            label="Autor"
            name="autor"
            :options="$options"
        />
    </x-form.form>

    <script>
        function cancel() {
            event.preventDefault()
            window.location.href = "/";
        }
    </script>
</x-layouts.content>