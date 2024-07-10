@php
    $titles = ['#', 'Título', 'Ubicación', 'Ejemplares', 'Acciones'];
@endphp

<x-layouts.content>
    <div class="w-full flex justify-between items-center">
        <p><b>Catálogo de libros</b></p>
        <a href="/books/create">
            <x-form.button>
                Agregar libro
            </x-form.button>
        </a>
    </div>
    <div class="overflow-x-auto">

            <table class="table">
                <thead>
                  <tr>
                    @foreach ($titles as $title)
                        <th scope="col" class="text-center">{{ $title }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                    <tr>
                        <th scope="row">{{$libro->id}}</th>
                        <td class="text-center">{{$libro->titulo}}</td>
                        <td class="text-center">{{$libro->ubicacion}}</td>
                        <td class="text-center">{{$libro->cantidad_de_ejemplares}}</td>
                        <td>
                            <div class="flex wrap gap-2 justify-center items-center">
                                <x-form.button 
                                    class="btn-outline btn-info"
                                >
                                    Ver detalles
                                </x-form.button>
                                <x-form.button 
                                    class="btn-outline btn-warning edit-book"
                                    data-url="{{ route('books.edit', $libro->id) }}"
                                >
                                    Editar
                                </x-form.button>
                                <form 
                                    action="{{ route('books.destroy', $libro->id)}}"
                                    method="POST"    
                                >
                                    @method('DELETE')
                                    @csrf
                                    <x-form.button 
                                        class="btn-outline btn-error"
                                    >
                                        Eliminar
                                    </x-form.button>
                                </form>
                                <x-form.button 
                                    class="btn-outline btn-success"
                                >
                                    Agregar préstamo
                                </x-form.button>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    
    <script>
        $(function() {
            $('.edit-book').on('click', function() {
                event.preventDefault()
                window.location.href = $(this).data('url')
            })
        })

    </script>

</x-layouts.content>