@props(['label' => 'Label', 'name' => '', 'placeholder' => '', 'type' => 'text', 'options' => ''])

<div class="dropdown dropdown-bottom w-full flex flex-col gap-2">
    <x-input
        label="{{ $label }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder}}"
        type="{{ $type}}"
    />
    <ul 
        tabindex="0" 
        class="w-full h-24 overflow-y-auto flex flex-col gap-2 dropdown-content bg-base-100 rounded-box z-[1] p-2 shadow">
        @foreach ($options as $option)
            <li><a>{{ $option }}</a></li>
        @endforeach
    </ul>
</div>