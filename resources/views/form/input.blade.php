<div class="col-md-6 mb-3">
    {!! Form::label($input, $attributes['placeholder'] ?? $input, ['class' => 'control-label']) !!}
    {!! Form::text($input, $value ?? null, array_merge(['class' => 'form-control'], $attributes)) !!}
</div>
