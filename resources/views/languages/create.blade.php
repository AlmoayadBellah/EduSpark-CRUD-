{{-- Languages --}}
<div class="mb-4">

    <label for="languages" class="form-label fw-bold">
        Languages
    </label>

    <select
        name="languages[]"
        id="languages"
        class="form-select @error('languages') is-invalid @enderror"
        multiple
    >

        @foreach($languages as $language)

            <option
                value="{{ $language->id }}"
                @selected(
                    in_array(
                        $language->id,
                        old('languages', [])
                    )
                )
            >
                {{ $language->name }} ({{ $language->code }})
            </option>

        @endforeach

    </select>

    <small class="text-muted">
        Hold Ctrl and select multiple languages.
    </small>

    @error('languages')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>