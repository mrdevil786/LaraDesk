<div class="{{ $class }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
           id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" placeholder="Enter {{ $placeholder }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>