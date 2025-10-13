<div class="form-field__input checkbox-field">
    <label>
        <input type="checkbox" name="{{ $name }}" value="{{ $value }}">
        {{ $slot }}
    </label>
    <div class="form-field__footer">
        @error($name)
        <p class="form-field__error">
            {{ $message }}
        </p>
        @enderror
        @isset($helper)
            <p class="form-field__helper">{{ $helper }}</p>
        @endisset
    </div>
</div>
