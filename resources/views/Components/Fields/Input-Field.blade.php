<div class="{{ $class }}">
    <label class="form-label mt-0" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
           id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" placeholder="Enter {{ $placeholder }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>