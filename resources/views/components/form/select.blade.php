@props(['options', 'name', 'label' => '', 'value' => ''])

<label class="form-control min-w-full max-w-xs">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>
    <select name="{{ $name }}" class="input input-bordered min-w-full max-w-xs">
        @foreach ($options as $option)
            <option value="{{ $option->value }}" {{ $option->value == $value ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
    </select>

    <script>
        console.log(<?php echo $value ?>);
    </script>
    
</label>