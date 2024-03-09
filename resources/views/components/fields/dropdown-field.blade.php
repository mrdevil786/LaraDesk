<div class="{{ $class }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-select form-control @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}">
        <option selected disabled hidden value="">Choose...</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $text }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>