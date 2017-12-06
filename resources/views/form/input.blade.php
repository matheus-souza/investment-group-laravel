<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input }}</span>
    {!! Form::text($input, $value ?? null, $attributes) !!}
</label>
