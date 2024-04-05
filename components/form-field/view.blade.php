<fieldset {{ $attributes->bem('form-field') }}>
    <div class="form-field__header">
        <label for="{{ $for }}" class="form-field__label">
            {{ $label }}
        </label>
        @isset($optional)
            <p class="form-field__optional">
                {{ $optional }}
            </p>
        @endisset
    </div>
    <div class="form-field__input">
        {{ $slot }}
    </div>
    <div class="form-field__footer">
        @error($for)
            <p class="form-field__error">
                {{ $message }}
            </p>
        @enderror
        @isset($helper)
            <p class="form-field__helper">{{ $helper }}</p>
        @endisset
    </div>
</fieldset>
