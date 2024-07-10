@props(['routestr' => '', 'class' => ''])

<form 
        action="{{ route($routestr) }}"
        method="POST"
        {{ $attributes->merge(['class' => 'w-1/3 bg-base-300 flex flex-col justify-center items-center gap-4 p-8 rounded-lg ' . $class]) }}
    >
        @csrf
        {{$slot}}
        <div class="w-full flex gap-4 justify-center items-center">
            <x-form.button 
                class="btn-secondary"
                onclick="cancel()"
            >
                Cancelar
            </x-form.button>
            <x-form.button class="btn-primary">
                Guardar
            </x-form.button>
        </div>
    </form>

    <script>
        function cancel() {
            event.preventDefault()
            window.location.href = "/";
        }
    </script>