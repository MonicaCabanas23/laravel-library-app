@php
    $options = [];
    foreach ($autores as $autor) {
        array_push($options, $autor->nombre);
    }
@endphp

<x-layouts.content>
    <form 
        action="{{ route('books.store') }}"
        method="POST"
        class="w-1/3 bg-base-300 flex flex-col justify-center items-center gap-4 p-8 rounded-lg"
    >
        @csrf
        <x-input
            label="Título"
            name="titulo"
            placeholder="Título del libro"
        />
        <x-input
            label="Ubicación"
            name="ubicacion"
            placeholder="Ubicación física del libro"
        />
        <x-input
            label="Cantidad de ejemplares"
            name="cantidad_de_ejemplares"
            placeholder="Cantidad de ejemplares"
            type="number"
        />
        <x-dropdown
            label="Autor"
            name="autor"
            placeholder="Seleccione un autor"
            :options="$options"
        />
        <div class="w-full flex gap-4 justify-center items-center">
            <x-button class="btn-secondary">
                Cancelar
            </x-button>
            <x-button class="btn-primary">
                Guardar
            </x-button>
        </div>
    </form>
</x-layouts.content>