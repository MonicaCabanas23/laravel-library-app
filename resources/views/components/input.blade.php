@props(['label' => 'Label', 'name' => 'name', 'placeholder' => 'Type here', 'type' => 'text'])

<label class="form-control min-w-full max-w-xs">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>
    <input 
        type="{{ $type }}" 
        placeholder="{{ $placeholder }}" 
        class="input input-bordered min-w-full max-w-xs" 
        name="{{ $name }}"
    />
</label>