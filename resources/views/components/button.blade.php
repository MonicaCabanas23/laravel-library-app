@props(['onClick' => '', 'class' => ''])

<button {{ $attributes->merge(['class' => 'btn ' . $class, 'onclick' => $onClick])}}>
    {{$slot}}
</button>
