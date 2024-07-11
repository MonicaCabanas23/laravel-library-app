@php
    $titles = ['Id del ejemplar', 'Nombre', 'Fecha de préstamo', 'Acciones'];
@endphp

<x-layouts.content>
    <div class="w-full min-h-full">
        <div class="w-full flex justify-between items-center">
            <p><b>Préstamos activos de: {{ $booktitle}}</b></p>
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
                        @foreach ($bookings as $booking)
                        <tr>
                            <th scope="row">{{$booking->copy_id}}</th>
                            <td class="text-center">{{$booking->nombre}}</td>
                            <td class="text-center">{{$booking->fecha_de_prestamo}}</td>
                            <td>
                                <div class="flex wrap gap-2 justify-center items-center">
                                    <x-form.button 
                                        class="btn-outline btn-success"
                                    >
                                        Devolver
                                    </x-form.button>
                                </div>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
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