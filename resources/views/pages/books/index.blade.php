@php
    $titles = ['#', 'Título', 'Ubicación', 'Autor', 'Ejemplares disponibles', 'Ejemplares prestados'];
@endphp

<x-layouts.content>
    <div class="w-full min-h-full flex flex-col gap-4">
        <div class="w-full flex justify-between items-center">
            <p><b>Catálogo de libros</b></p>
            <a href="/books/create">
                <x-form.button>
                    Agregar libro
                </x-form.button>
            </a>
        </div>
        <x-table>
            <x-slot name="headers">
                @foreach ($titles as $title)
                    <th scope="col" class="text-center text-base">{{ $title }}</th>
                @endforeach
            </x-slot>
            @foreach ($libros as $libro)
                <tbody>
                    <tr class="hover:bg-base-200 cursor-pointer table-row" data-href="{{$libro->id}}">
                        <th scope="row" class="text-center">
                            {{$libro->id}}
                        </th>
                        <td class="text-center">{{$libro->titulo}}</td>
                        <td class="text-center">{{$libro->ubicacion}}</td>
                        <td class="text-center">{{$libro->autor}}</td>
                        <td class="text-center">{{$libro->ejemplares_disponibles}}</td>
                        <td class="text-center">{{$libro->ejemplares_prestados}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="table-cell hidden" id="{{$libro->id}}">
                            <div class="flex flex-wrap gap-2 justify-end items-center">
                                <x-form.button 
                                    class="btn-outline btn-info view-active-bookings px-2 flex-col gap-1"
                                    data-url="{{ route('bookings.index', $libro->id)}}"
                                >
                                    <i class="fa-solid fa-clock"></i>
                                    <span><p style="font-size: x-small;">Prestados</p></span>
                                </x-form.button>
                                <x-form.button 
                                    class="btn-outline btn-info view-active-bookings px-2 flex-col gap-1"
                                    data-url="{{ route('copies.index', $libro->id)}}"
                                >
                                <i class="fa-solid fa-check"></i>
                                    <span><p style="font-size: x-small;">Disponibles</p></span>
                                </x-form.button>
                                <x-form.button 
                                    class="btn-outline btn-warning edit-book px-2 flex-col gap-1"
                                    data-url="{{ route('books.edit', $libro->id) }}"
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span><p style="font-size: x-small;">Editar</p></span>
                                </x-form.button>
                                <form 
                                    action="{{ route('books.destroy', $libro->id)}}"
                                    method="POST"    
                                >
                                    @method('DELETE')
                                    @csrf
                                    <x-form.button 
                                        class="w-full btn-outline btn-error flex-col gap-1"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                        <span><p style="font-size: x-small;">Eliminar</p></span>
                                    </x-form.button>
                                </form>
                                <x-form.button 
                                    class="btn-outline btn-success add-booking px-2 flex-col gap-1"
                                    data-url="{{ route('bookings.create', $libro->id) }}"
                                >
                                    <i class="fa-solid fa-bookmark"></i>
                                    <span><p style="font-size: x-small;">Prestar</p></span>
                                </x-form.button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </x-table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</x-layouts.content>