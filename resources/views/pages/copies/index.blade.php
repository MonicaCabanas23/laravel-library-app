@php
    $titles = ['Id del ejemplar', 'Acciones'];
@endphp

<x-layouts.content>
    <div class="w-full min-h-full flex flex-col gap-4">
        <div class="w-full flex justify-between items-center">
            <p><b>Ejemplares disponibles de: {{ $booktitle }}</b></p>
        </div>
        <x-table>
            <x-slot name="headers">
            @foreach ($titles as $title)
                        <th scope="col" class="text-center text-base">{{ $title }}</th>
                    @endforeach
            </x-slot>
            @foreach ($copies as $copy)
                <tr>
                    <th scope="row" class="w-24 text-center">{{$copy->id}}</th>
                    <td>
                        <div class="flex wrap gap-2 justify-center items-center">
                            <x-form.button 
                                class="btn-outline btn-success borrow"
                                data-url="{{ route('copies.borrow', $copy->id) }}"
                            >
                                Prestar
                            </x-form.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
</x-layouts.content>