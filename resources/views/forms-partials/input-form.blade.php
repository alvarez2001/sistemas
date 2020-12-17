<div class="{{ $columns }} form-group">
    <label for="{{ $name }}" class="@error('{{ $name }}') text-danger @enderror">{{ $name }}*</label>
    <input maxlength="{{ $max }}" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}" @if ($validar)
    required
    class="form-control validarInput"
@else
    class="form-control"
    @endif

    value="{{ old($name, $attrModel) }}"
    >
    <small class="form-text  @error('{{ $name }}') invalid-feedback @else text-muted @enderror">
        @error('{{ $name }}')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @else
            {{ $placeholder }}
        @enderror
    </small>
</div>
