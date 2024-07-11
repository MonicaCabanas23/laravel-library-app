@php
    $titles = ['Id del ejemplar', 'Acciones'];
@endphp

<x-layouts.content>
<div class="w-full min-h-full">
        <div class="w-full flex justify-between items-center">
            <p><b>Ejemplares disponibles de: {{ $booktitle}}</b></p>
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
                        @foreach ($copies as $copy)
                        <tr>
                            <th scope="row">{{$copy->id}}</th>
                            <td>
                                <div class="flex wrap gap-2 justify-center items-center">
                                    <x-form.button 
                                        class="btn-outline btn-success"
                                    >
                                        Prestar
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
</x-layouts.content>