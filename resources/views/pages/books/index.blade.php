@php
    $titles = ['#', 'Título', 'Ubicación', 'Ejemplares', 'Acciones'];
@endphp

<x-layouts.content>
    <div class="w-full flex justify-between items-center">
        <p><b>Catálogo de libros</b></p>
        <a href="/book/create">
            <x-button>
                Agregar libro
            </x-button>
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
                                <x-button class="btn-outline btn-info">
                                    Ver detalles
                                </x-button>
                                <x-button class="btn-outline btn-warning">
                                    Editar
                                </x-button>
                                <x-button class="btn-outline btn-error">
                                    Eliminar
                                </x-button>
                                <x-button class="btn-outline btn-success">
                                    Agregar préstamo
                                </x-button>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    
    </div>
</x-layouts.content>