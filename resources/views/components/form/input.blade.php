@props([
    'label' => 'Label', 
    'name' => 'name', 
    'placeholder' => 'Type here', 
    'type' => 'text', 
    'value' => '',
])

<label class="form-control min-w-full max-w-xs">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>
    <input 
        value="{{ $value }}"
        type="{{ $type }}" 
        placeholder="{{ $placeholder }}" 
        class="input input-bordered min-w-full max-w-xs" 
        name="{{ $name }}"
    />
</label>