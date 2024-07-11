@php
    $titles = ['Id del ejemplar', 'Nombre', 'Fecha de préstamo', 'Acciones'];
@endphp

<x-layouts.content>
    <div class="w-full min-h-full flex flex-col gap-4">
        <div class="w-full flex justify-between items-center">
            <p><b>Préstamos activos de: {{ $booktitle}}</b></p>
        </div>
        <x-table>
            <x-slot name="headers">
                @foreach ($titles as $title)
                    <th scope="col" class="text-center text-base">{{ $title }}</th>
                @endforeach
            </x-slot>
            @foreach ($bookings as $booking)
                <tr>
                    <th scope="row">{{$booking->copy_id}}</th>
                    <td class="text-center">{{$booking->nombre}}</td>
                    <td class="text-center">{{$booking->fecha_de_prestamo}}</td>
                    <td>
                        <div class="flex wrap gap-2 justify-center items-center">
                            <form 
                                action="{{ route('bookings.update', $booking->id)}}" 
                                method="POST"
                            >
                                @csrf
                                @method('PUT')
                                <x-form.button 
                                    class="btn-outline btn-success"
                                >
                                    Devolver
                                </x-form.button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table> 
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