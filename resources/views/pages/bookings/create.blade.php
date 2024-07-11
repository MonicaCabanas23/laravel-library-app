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
        <select name="copy" id="copy">
            @foreach ($copies as $copy)
                <option value="{{ $copy->id }}">Ejemplar {{ $copy->id }}</option>
            @endforeach
        </select>
    </x-form.form>
</x-layouts.content>